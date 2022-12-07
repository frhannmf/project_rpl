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
            "nim" => 'nullable|string',
            "email" => 'nullable|email',
            "name" => 'nullable|string',
            "gender" => 'nullable|string|in:Laki-Laki,Perempuan',
            "ttl" => 'nullable|string',
            "prodi" => 'nullable|string|in:DIV Statistika,DIV Komputasi Statistik,DIII Statistika',
            "status" => 'nullable|string|in:ALUMNI,MAHASISWA',
            "tahun_lulus" => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $fields = $validator->validated();
        User::where('id', $id)->update($fields);
        return redirect()->intended(route('user_dashboard'));
    }
}
