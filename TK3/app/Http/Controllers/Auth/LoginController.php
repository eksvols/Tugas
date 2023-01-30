<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/admin');
                    break;
                case 'staff':
                    return redirect()->intended('/staff');
                    break;
                case 'pembeli':
                    return redirect()->intended('/pembeli');
                    break;
                default:
                    return redirect()->intended('/');
                    break;
            }
        } else {
            return redirect()->back()->withInput($request->only('email'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
