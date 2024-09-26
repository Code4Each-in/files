<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth/login');
    }

    public function register(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->pswd,
        ]);
        return redirect()->route('landing_page')->with('success','Registration successfull! Please Login.');

    }
}
