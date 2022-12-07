<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetUser extends Model
{
    use HasFactory;
    protected $table = 'reset_user';
    protected $fillable = [
        'type',
        'nim',
        'name',
        'gender',
        'prodi',
        'status',
        'tahun_lulus',
        'email',
        'selesai'
    ];
}
