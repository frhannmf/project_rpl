<?php

namespace App\Http\Controllers;

use App\Models\ResetUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetUserController extends Controller
{
    public function index()
    {
        $resets = ResetUser::all()->toArray();
        return view('admin.forgot.index', ['resets' => $resets]);
    }

    public function indexForgotNim($id)
    {
        $reset = ResetUser::where('id', $id)->first()->toArray();
        $users = User::where('gender', $reset['gender'])->where('prodi', $reset['prodi'])->where('status', $reset['status'])->where('tahun_lulus', $reset['tahun_lulus'])->orderBy('id', 'desc')->get()->toArray();
        return view('admin.forgot.nim_detail', ['reset' => $reset, 'users' => $users]);
    }

    public function lupaNim(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required|string',
            "gender" => 'required|string|in:Laki-Laki,Perempuan',
            "prodi" => 'required|string|in:DIV Statistika,DIV Komputasi Statistik,DIII Statistika',
            "status" => 'required|string|in:ALUMNI,MAHASISWA',
            "tahun_lulus" => 'required|string',
            "email" => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $fields = $validator->validated();
        $fields['type'] = 'nim';
        ResetUser::create($fields);
        return redirect()->intended(route('login'));
    }

    public function lupaPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nim" => 'required|string',
            "email" => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $fields = $validator->validated();
        $fields['type'] = 'password';
        ResetUser::create($fields);
        return redirect()->intended(route('login'));
    }

    public function resetUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "nim" => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $fields = $validator->validated();
        $user = User::where('nim', $fields['nim'])->first();
        if (!$user) {
            return back()->withErrors(['user' => 'user tidak ditemukan']);
        }
        $password_hash = Hash::make($user['nim']);
        User::where('id', $user['id'])->update(['password' => $password_hash]);
        ResetUser::where('id', $id)->update(['selesai' => true, 'nim' => $user['nim']]);
        return redirect()->intended(route('forgot_list'));
    }
}
