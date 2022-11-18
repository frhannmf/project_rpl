<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'USER')->get()->toArray();
        return view('admin.userman.index', ['users' => $users]);
    }

    public function indexDetail($id)
    {
        $user = User::where('id', $id)->first()->toArray();
        return view('admin.userman.detail', ['user' => $user]);
    }

    public function indexUpdate($id)
    {
        $user = User::where('id', $id)->first()->toArray();
        return view('admin.userman.update_form', ['user' => $user]);
    }

    public function indexDelete($id)
    {
        $user = User::where('id', $id)->first()->toArray();
        return view('admin.userman.delete_form', ['user' => $user]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nim" => "required",
            "email" => "required|email",
            "password" => "nullable|string",
            "name" => 'nullable|string',
            "gender" => 'nullable|string|in:Laki-Laki,Perempuan',
            "prodi" => 'nullable|string|in:DIV Statistika,DIV Komputasi Statistik,DIII Statistika,Pilih Prodi',
            "status" => 'nullable|string|in:ALUMNI,MAHASISWA',
            "tahun_lulus" => 'nullable|string',
        ]);
        if ($validator->fails()) {
            dd($validator->errors(), $request->prodi);
            return back()->withErrors($validator->errors());
        }
        $fields = $validator->validated();
        $fields['role'] = 'USER';
        if ($fields['prodi'] == 'Pilih Prodi') {
            $fields['prodi'] = null;
        }
        if ($fields['password'] != null) {
            $fields['password'] = Hash::make($fields['password']);
        } else {
            $fields['password'] = Hash::make($fields['nim']);
        }
        User::create($fields);
        return redirect()->intended(route('admin_user_list'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "nim" => "nullable|string",
            "email" => "nullable|email",
            "password" => "nullable|string",
            "name" => 'nullable|string',
            "gender" => 'nullable|string|in:Laki-Laki,Perempuan',
            "prodi" => 'nullable|string|in:DIV Statistika,DIV Komputasi Statistik,DIII Statistika,Pilih Prodi',
            "status" => 'nullable|string|in:ALUMNI,MAHASISWA',
            "tahun_lulus" => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $fields = $validator->validated();
        if ($fields['prodi'] == 'Pilih Prodi') {
            $fields['prodi'] = null;
        }
        if ($fields['password'] != null) {
            $fields['password'] = Hash::make($fields['password']);
        } else {
            unset($fields['password']);
        }
        User::where('id', $id)->update($fields);
        return redirect()->intended(route('admin_user_list'));
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect()->intended(route('admin_user_list'));
    }
}