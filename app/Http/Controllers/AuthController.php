<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|string|min:10|max:10',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => Hash::make($validatedData['password']),
            'status' => 1, 
        ]);

        // Respond with JSON
        return response()->json([
            'message' => 'Registration successful! Please login.',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
    {
        // Extract custom field names
        // dd($request->fileId);
        $customData = $request->only(['email1', 'password1']);
        $validatedData = $request->validate([
            'email1' => 'required',
            'password1' => 'required'
        ],
        [
            'email1.required'  => 'The email field is required.',
            'password1.required'    => 'The password field is required'
        ]);

        // Attempt to log in the user with custom field names
        if (Auth::attempt([
            'email' => $customData['email1'],
            'password' => $customData['password1']
        ])) {
            $user = Auth::user();
            if(isset($request->fileId) && !empty($request->fileId)){
            //   $fileDetail = File::where([['unique_id', $request->fileId],['private_link_hit', 'Y'],])->get();
            //   dd($fileDetail);
              return response()->json([
                'message' => 'Login successful!',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    // 'fileLink' => $fileDetail[0]['file_link'],
                    'fileId' => $request->fileId,
                    'hasFileId' => true, 
                ]
            ]);
            }else{

                return response()->json([
                    'message' => 'Login successful!',
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'hasFileId' => false,
                    ]
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
    }

    public function logOut() 
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }	
    
}
