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
        return view('home');
    }

    public function insertFileInfo(Request $request)
    {
        //  print_r($resquest->uniquid);    
        //  echo $request->title.'<br>'.$request->message; 
        
        ini_set('upload_max_filesize', '500M');
        ini_set('post_max_size', '500M');
        ini_set('memory_limit', '512M');
        ini_set('max_execution_time', '300');  // Increase execution time if necessary


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
        // dd($fileDetail);
        if ($fileDetail['file_type'] == 'private') {
            File::where('id', $fileDetail['id'])->update(array('private_link_hit' => 'Y'));
            return Redirect::to('login');
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
