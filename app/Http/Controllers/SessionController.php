<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    function index() {
        return view('sesi.index');
    }

    function login(Request $request) {
        Session::flash('email', $request->email);
        $request->validate([
            'identity' => 'required',
            'password' => 'required',
        ], [
            'identity.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = $request->only('identity', 'password');

        if (filter_var($credentials['identity'], FILTER_VALIDATE_EMAIL)) {
            $field = 'email'; // Jika input adalah email, set field untuk pencocokan ke 'email'
        } else {
            $field = 'username'; // Jika input bukan email, set field untuk pencocokan ke 'username'
        }

        $infologin = [
            $field => $credentials['identity'],
            'password' => $credentials['password']
        ];

        if(Auth::attempt($infologin)) {
            // jika autentikasi sukses
            return redirect('post')->with('success', 'Berhasil login');
        }else{
            // jika autentikasi gagal
            return redirect('sesi')->withErrors('Email atau Username dan Password yang dimasukkan tidak valid');
        }
    }

    function logout() {
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil logout');
    }

    function register() {
        return view('sesi.register');
    }

    function create(Request $request) {
        Session::flash('name', $request->name);
        Session::flash('username', $request->username);
        Session::flash('email', $request->email);

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Nama wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Silahkan masukkan email yang valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Minimum password 8 karakter'
        ]);
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)) {
            // jika autentikasi sukses
            return redirect('post')->with('success', Auth::user()->name . ' berhasil register');
        }else{
            // jika autentikasi gagal
            return redirect('sesi')->withErrors('Email dan Password yang dimasukkan tidak valid');
        }
        
        return view('sesi.index');
    }
}
