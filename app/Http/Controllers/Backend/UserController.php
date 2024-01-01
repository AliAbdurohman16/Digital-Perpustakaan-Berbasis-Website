<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        return view('backend.user.add');
    }

    public function store(Request $request)
    {
        // validation
        $request->validate([
            'fullname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required',
        ]);

        // insert to table users
        $user = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // assign role
        $user->assignRole($request->role);

        return redirect('users')->with('message', 'Pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request,$id)
    {
        // get data by id
        $user = User::find($id);

        // check if email unique the user email
        if ($user->email == $request->email) {
            $rules_email = 'required|email';
        } else {
            $rules_email = 'required|email|unique:users';
        }

        // check if the user password
        if ($request->password) {
            $rules_password = 'required|min:8|confirmed';
        } else {
            $rules_password = '';
        }

        $request->validate([
            'fullname' => 'required|max:255',
            'email' => $rules_email,
            'password' => $rules_password,
            'role' => 'required',
        ]);

        // update to tabel users
        $user->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($rules_password) : $user->password
        ]);

        // assign role
        $user->assignRole($request->role);

        return redirect('users')->with('message', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // proccess delete
        $user = User::find($id);
        $user->delete();

        return response()->json(['message', 'Pengguna berhasil dihapus.']);
    }
}
