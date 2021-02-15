<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //This signs in the user using the auth() helper
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', 'Invalid Login details');
        }

        //Finally redirect the user to the dashboard
        return redirect()->route('dashboard');
    }
}
