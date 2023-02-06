<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    // User Managament
    public function userDisplay(){
        $users = User::all();
        return view('admin.userDisplay', compact('users'))
                    ->with('i', (request()->input('page', 1)-1)*5);
    }

    public function userCreate()
    {
        $roles = Role::all();
        return view('admin.userCreate', compact('roles'));
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
            'gender' => 'nullable',
            'alamat' => 'nullable',
            'foto_ktp' => 'nullable',
        ]);

        User::create($request->all());

        return redirect()->route('admin.userDisplay')
                        ->with('success', 'User Created successfully');
    }

    public function userShow($id)
    {
        $user = User::find($id);
        return view('admin.usershow', compact('user'));
    }

    public function userEdit($id)
    {
        $user = User::find($id);
        return view('admin.useredit', compact('user'));
    }

 function userUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('admin.userDiplay')
                        ->with('success', 'User Updated Successfully');
    }

    public function userDelete($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.userDisplay')
                        ->with('success', 'User Deleted Successfully');
    }
}
