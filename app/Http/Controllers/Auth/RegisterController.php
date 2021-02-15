<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view ('auth.register');
    }

    public function store(Request $request)
    {
        //We want to validate the user first
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        //Store the user on the database with the following attributes
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //This signs in the user using the auth() helper
        auth()->attempt($request->only('email', 'password'));

        //Finally redirect the user to the dashboard
        return redirect()->route('dashboard');
    }
}
