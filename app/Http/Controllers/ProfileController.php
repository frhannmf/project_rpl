<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', ["user" => $user]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "nim" => 'string',
            "email" => 'email',
            "name" => 'string',
            "gender" => 'string|in:Laki-Laki,Perempuan',
            "prodi" => 'string|in:DIV Statistika,DIV Komputasi Statistik,DIII Statistika',
            "status" => 'string|in:ALUMNI,MAHASISWA',
            "tahun_lulus" => 'string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $fields = $validator->validated();
        User::where('id', $id)->update($fields);
        return redirect()->intended(route('user_dashboard'));
    }
}
