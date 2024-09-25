<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
        $validated = $request->validate([
            'title'=> 'required|string|max:255',
            'fileToTransfer'=> 'required|file|mimes:jpg,png,pdf|max:5120'

        ]);
        $fileName='';
        $fileType = ((isset($request->file_type) && !empty($request->file_type))? $request->file_type: null);
        $title = ((isset($request->title) && !empty($request->title))? $request->title: null);        
        if ($request->hasFile('fileToTransfer')) {
            $fileName = time() . '.' . $request->fileToTransfer->getClientOriginalExtension();
            $path = public_path('assets/files/');
            $request->fileToTransfer->move($path,$fileName);
            // $fileUrl = 'assets/files/' . $fileName;
        }
        $uniqId = substr(uniqid(), 0, 10);  // First 10 characters of the uniqid
        $url = env('APP_URL', 'http://localhost');        
        $fileLink = $url . '/download-file/' . $uniqId; 
        $userId = ((Auth::check())? Auth::user()->id: null); 
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

        // Assuming file is stored in public/files/
        $filePath = public_path('assets/files/' . $fileDetail['upload_file_path']);

        if (!file_exists($filePath)) {
            abort(404, "File not found.");
        }

        return response()->download($filePath);
    }
}
