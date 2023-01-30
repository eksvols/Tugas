<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        // Autentikasi dan otorisasi middleware
        $this->middleware('auth');
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $users = User::all();
        } elseif (auth()->user()->role === 'staff') {
            $users = User::where('role', 'pembeli')->get();
        } else {
            return redirect('/')->with('error', 'Akses ditolak');
        }

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role === 'admin' || auth()->user()->role === 'staff') {
            return view('users.create');
        } else {
            return redirect('/')->with('error', 'Akses ditolak');
        }
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->role === 'admin' || auth()->user()->role === 'staff') {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'role' => 'required',
            ]);

            // Create user
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->role = $request->input('role');
            $user->save();

            return redirect('/users')->with('success', 'User berhasil ditambahkan');
        } else {
            return redirect('/')->with('error', 'Akses ditolak');
        }
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        if (Auth::user()->role->name == 'admin') {
            return view('users.edit', compact('user', 'roles'));
        } elseif (Auth::user()->role->name == 'staff' && $user->role->name == 'pembeli') {
            return view('users.edit', compact('user', 'roles'));
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki hak akses!');
        }
    }

public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (Auth::user()->role->name == 'admin') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|confirmed'
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role,
                'password' => $request->password ? bcrypt($request->password) : $user->password
            ]);
        } elseif (Auth::user()->role->name == 'staff' && $user->role->name == 'pembeli') {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|confirmed'
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $user->password
            ]);
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki hak akses!');
        }
        return redirect()->route('users.index')->with('success', 'Data user berhasil diubah!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('users.index')->with('success', 'user berhasil dihapus');
    }
}