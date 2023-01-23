<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
    //validasi form
    $validator = Validator::make($request->all(), [
        'username' => 'required',
        'password' => 'required|min:10',
    ]);
    if ($validator->fails()) {
        return redirect('/login')
            ->withErrors($validator)
            ->withInput();
    }
    //cek email dan password di database
    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        //jika sesuai, redirect ke halaman home
        return redirect()->intended('home');
    }
    //jika tidak sesuai, redirect ke halaman login dan tampilkan pesan error
    return redirect('/login')->with('error', 'Username atau password salah.');
}

    public function register(Request $request)
    {
    //validasi form
    $validator = Validator::make($request->all(), [
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:10|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/',
    ]);
    if ($validator->fails()) {
        return redirect('/register')
            ->withErrors($validator)
            ->withInput();
    }
    //create user baru
    $user = new F_users;
    $user->username = $request->username;
    $user->password = Hash::make($request->password);
    $user->save();
    //redirect ke halaman login
    return redirect('/login')->with('success', 'Registrasi berhasil. Silahkan login.');
}

    public function resetPassword(Request $request)
{
    //validasi form
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string|min:10|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?[@$!%?&])[A-Za-z\d@$!%*?&]{10,}$/|confirmed',
    ]);
    if ($validator->fails()) {
        return redirect('/reset-password')
        ->withErrors($validator)
        ->withInput();
    }
//cek username di database
    $user = F_users::where('email', $request->email)->first();
    if ($user) {
//update password
        $user->password = Hash::make($request->password);
        $user->save();
//redirect ke halaman login
        return redirect('/login')->with('success', 'Password berhasil diubah. Silahkan login.');
    }
//jika email tidak ditemukan, redirect ke halaman reset-password dan tampilkan pesan error
    return redirect('/reset-password')->with('error', 'Username tidak terdaftar.');
}
}
