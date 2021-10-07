<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Hash;

class UserController extends Controller
{
    public function index(){
        $users = Users::all();
        return view('admin.user', ['users' => $users]);
    }

    public function tambah(){
        return view('admin.tambahuser', [
            'role' => ['admin', 'dosen', 'mahasiswa']
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'kode' => ['required', 'string', 'min:8', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telpon' => ['required', 'string', 'min:10'],
            'role' => ['required', 'string', 'max:255'],
        ]);
    }

    public function simpan(Request $request) {
        Users::create([
            'kode' => $request->kode,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telpon' => $request->telpon,
            'role' => $request->role,
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        return redirect("/user");
    }

    public function edit($id) {
        $user = Users::find($id);
        return view('admin.edituser', ['user' => $user, 'role' => ['admin', 'dosen', 'mahasiswa']]);
    }

    public function update($id, Request $request) {
        $user = Users::find($id);
        $user->kode = $request->kode;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password1=="") {
            $user->password = $request->password2;
        }else {
            $user->password = Hash::make($request->password1);
        }
        $user->telpon = $request->telpon;
        $user->role = $request->role;
        $user->save();
        return redirect("/user");
    }

    public function delete($id) {
        $user = Users::find($id);
        $user->delete();
        return redirect('/user');
    }
}
