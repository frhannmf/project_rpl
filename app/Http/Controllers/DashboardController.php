<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $isProfileEmpty = $user['name'] == null || $user['gender'] == null || $user['prodi'] == null || $user['status'] == null || $user['tahun_lulus'] == null;
        return view('user.index', ["user" => $user, 'isProfileEmpty' => $isProfileEmpty]);
    }
}
