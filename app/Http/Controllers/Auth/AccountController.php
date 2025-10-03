<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }


    public function handleRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('index');
    }
    public function handlelogin(Request $request)
    {
        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);



        $islogin = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if (!$islogin) {
            return redirect()->back()->with('msg', 'invalid email or password');
        }
        if (Auth::user()->role == "admin") {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('index');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
