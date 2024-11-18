<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function index()
    {
        // Get the fileId from the query parameter
        $fileId = request()->query('fileId');

        // If fileId is not null, query the File model
        $file = null;
        $fileLink = '';
        if ($fileId) {
            if(Auth::check()){
                $fileLink = File::where('unique_id', $fileId)->value('file_link'); // Adjust the field name if needed
            }else{
                return redirect()->route('login');
            }
        }

        // Pass the file data to the view
        return view('home', compact('fileLink'));
    }

    // public function insertFileInfo(Request $request)
    // {        
    //     //  print_r($resquest->uniquid);    
    //     //  echo $request->title.'<br>'.$request->message; 
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'fileToTransfer' => 'required|max:512000'
    //     ]);
    //     $fileName = '';
    //     $fileType = ((isset($request->file_type) && !empty($request->file_type)) ? $request->file_type : null);
    //     $title = ((isset($request->title) && !empty($request->title)) ? $request->title : null);
    //     if ($request->hasFile('fileToTransfer')) {
    //         $fileName = time() . '.' . $request->fileToTransfer->getClientOriginalExtension();
    //         $path = public_path('assets/files/');
    //         $request->fileToTransfer->move($path, $fileName);
    //         // $fileUrl = 'assets/files/' . $fileName;
    //     }
    //     $uniqId = substr(uniqid(), 0, 10);  // First 10 characters of the uniqid
    //     $url = env('APP_URL', 'http://localhost');
    //     $fileLink = $url . '/download-file/' . $uniqId;
    //     $userId = ((Auth::check()) ? Auth::user()->id : null);
    //     File::create([
    //         'user_id' => $userId,
    //         'upload_file_path' => $fileName,
    //         'file_link' => $fileLink,
    //         'file_type' => $fileType,
    //         'unique_id' => $uniqId
    //     ]);
    //     return response()->json(['status' => true, 'success' => 'Form submitted and file uploaded successfully!', 'fileLink' => $fileLink]);
    // }

    public function downloadFile($fileid)
    {
        
        $fileDetail = File::where('unique_id', $fileid)->first();
        if ($fileDetail['file_type'] == 'private') {
              // Check if the user is logged in
                if (Auth::check()) {
                    // If the user is logged in, mark the private link hit
                    File::where('id', $fileDetail['id'])->update(['private_link_hit' => 'Y']);
                    // Assuming file is stored in public/files/
                    $filePath = public_path('assets/files/' . $fileDetail['upload_file_path']);
                    if (!file_exists($filePath)) {
                        abort(404, "File not found.");
                    } else {
                        // Increment the download count
                        $fileDetail->increment('file_count');
                        return response()->download($filePath);
                    }
                } else {
                    // Redirect to login if user is not logged in
                    return redirect()->route('login', ['fileId' => $fileDetail['unique_id']]);
                }
        } else {
            // Assuming file is stored in public/files/
            $filePath = public_path('assets/files/' . $fileDetail['upload_file_path']);
            if (!file_exists($filePath)) {
                abort(404, "File not found.");
            } else {
                // Increment the download count
                $fileDetail->increment('file_count');
                return response()->download($filePath);
            }
        }
    }

        public function uploadChunk(Request $request)
    {
        $validated = $request->validate([
            'fileToTransfer' => 'required|max:512000', // Each chunk size limit
            'chunk' => 'required|integer',
            'totalChunks' => 'required|integer',
            'unique_id' => 'required|string',
            'original_filename' => 'required|string', // Validate the original filename
        ]);

        $chunk = $request->file('fileToTransfer');
        // $fileType = $request->fileToTransfer->getClientOriginalExtension();
        $chunkNumber = $request->input('chunk');
        $uniqueId = $request->input('unique_id');
        $originalFilename = $request->input('original_filename'); // Get the original filename

        // Store the chunk
        $chunkPath = storage_path("app/uploads/{$uniqueId}.part{$chunkNumber}");
        $chunk->move(dirname($chunkPath), basename($chunkPath));

        // If it's the last chunk, merge the files
        if ($chunkNumber == $request->input('totalChunks') - 1) {
            $this->mergeChunks($uniqueId, $request->input('totalChunks'),$originalFilename);
        }

        return response()->json(['status' => true, 'message' => 'Chunk uploaded successfully']);
    }

    protected function mergeChunks($uniqueId, $totalChunks,$originalFilename)
    {
        $finalPath = public_path("assets/files/{$uniqueId}.".pathinfo($originalFilename, PATHINFO_EXTENSION));
        // error_log("Final path: {$finalPath}");
        // die;
        $finalFile = fopen($finalPath, 'wb');

        for ($i = 0; $i < $totalChunks; $i++) {
            $chunkPath = storage_path("app/uploads/{$uniqueId}.part{$i}");
            $chunk = fopen($chunkPath, 'rb');
            stream_copy_to_stream($chunk, $finalFile);
            fclose($chunk);
            unlink($chunkPath); // Remove the chunk after merging
        }

        fclose($finalFile);

        // Optionally, call another method to create a file link
        // $this->createFileLink($finalPath, $uniqueId);
    }

    public function generateLink(Request $request)
    {
        $validated = $request->validate([
            'file_unique_id' => 'required|string',
            'original_filename' => 'required|string',
        ]);

        $file_unique_id = $request->input('file_unique_id');
        $original_filename = $request->input('original_filename');
        $file_type = $request->input('file_type');
        $fileName = $file_unique_id.'.'.pathinfo($original_filename, PATHINFO_EXTENSION);
        $uniqId = substr(uniqid(), 0, 10);
        $url = env('APP_URL', 'http://localhost');
        $fileLink = $url . '/download-file/' . $uniqId;
        // $fileLink = $url . '/assets/files/' . $uniqueId;

        // Optionally, save file info in the database
        $userId = Auth::check() ? Auth::user()->id : null;

        // Save file info if needed
        File::create([
            'user_id' => $userId,
            'upload_file_path' => $fileName, // Store the file path if needed
            'file_link' => $fileLink,
            'file_type' => $file_type,
            'unique_id' => $uniqId,
        ]);

        return response()->json(['status' => true, 'fileLink' => $fileLink]);
    }

}
