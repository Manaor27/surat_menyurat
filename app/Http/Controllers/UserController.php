<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::paginate(5);
        return view('admin.user', ['user' => $user]);
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
            'telpon' => ['required', 'numeric', 'min:10'],
            'role' => ['required', 'string', 'max:255'],
        ]);
    }

    public function simpan(Request $request) {
        $request->validate([
            'telpon' => 'numeric',
        ]);
        User::create([
            'kode' => $request->kode,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telpon' => $request->telpon,
            'role' => $request->role,
            'tempat_lahir' => $request->tempat,
            'tgl_lahir' => $request->tanggal,
            'jekel' => $request->jekel,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'prodi' => $request->prodi,
            'semester' => $request->semester,
            'periode' => $request->periode,
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        return redirect("/user");
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.edituser', ['user' => $user, 'role' => ['admin', 'dosen', 'mahasiswa'], 'agama' => ['Kristen','Islam','Katolik','Buddha','Hindu','Konghucu'], 'jekel' => ['Laki-laki','Perempuan'], 'prodi' => ['Sistem Informasi','Informatika'], 'semester' => ['Gasal','Genap']]);
    }

    public function update($id, Request $request) {
        $user = User::find($id);
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
        $user->tempat_lahir = $request->tempat;
        $user->tgl_lahir = $request->tanggal;
        $user->jekel = $request->jekel;
        $user->agama = $request->agama;
        $user->alamat = $request->alamat;
        $user->prodi = $request->prodi;
        $user->semester = $request->semester;
        $user->periode = $request->periode;
        $user->save();
        return redirect("/user");
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/user');
    }
}
