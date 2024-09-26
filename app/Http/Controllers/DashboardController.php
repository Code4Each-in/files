<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use App\Models\User;

class DashboardController extends Controller
{

    public function __construct()
    {
        // Apply the 'auth' middleware to all methods in this controller
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
        }
        $userFiles = File::where('user_id', $userId)->get();
        return view('dashboard', compact("userFiles"));
    }

    public function deleteFileLink(Request $request)
    {

        // dd($request->id);
        try {
            $userFile =  File::findOrFail($request->rowId);
            // dd($userFile);
            $userFile->delete();
            return response()->json(['message' => 'User File dleted succesfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete user file'], 500);
        }
    }
}
