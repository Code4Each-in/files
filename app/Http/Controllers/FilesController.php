<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function insertFileInfo(Request $request)
    {        
        //  print_r($resquest->uniquid);    
        //  echo $request->title.'<br>'.$request->message; 
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'fileToTransfer' => 'required|max:512000'
        ]);
        $fileName = '';
        $fileType = ((isset($request->file_type) && !empty($request->file_type)) ? $request->file_type : null);
        $title = ((isset($request->title) && !empty($request->title)) ? $request->title : null);
        if ($request->hasFile('fileToTransfer')) {
            $fileName = time() . '.' . $request->fileToTransfer->getClientOriginalExtension();
            $path = public_path('assets/files/');
            $request->fileToTransfer->move($path, $fileName);
            // $fileUrl = 'assets/files/' . $fileName;
        }
        $uniqId = substr(uniqid(), 0, 10);  // First 10 characters of the uniqid
        $url = env('APP_URL', 'http://localhost');
        $fileLink = $url . '/download-file/' . $uniqId;
        $userId = ((Auth::check()) ? Auth::user()->id : null);
        File::create([
            'user_id' => $userId,
            'upload_file_path' => $fileName,
            'file_link' => $fileLink,
            'file_type' => $fileType,
            'unique_id' => $uniqId
        ]);
        return response()->json(['status' => true, 'success' => 'Form submitted and file uploaded successfully!', 'fileLink' => $fileLink]);
    }

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
}
