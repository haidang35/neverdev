<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.pages.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials, true)) {
            return redirect()->route('admin.dashboard')->withSuccess('Login success');
        }
        return redirect()->route('auth.login.index')->withErrors('Login failed');
    }

    public function registration()
    {
        return view('admin.pages.auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'email' => 'email | required | unique:users',
            'username' => 'required | string',
            'password' => 'string | confirmed | required',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return redirect()->route('auth.login.index')->withSuccess('Sign up successfull');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['username'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }   

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return redirect()->route('auth.login.index');
    }
    
    
}
