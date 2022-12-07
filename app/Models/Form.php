<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $table = 'form';
    protected $fillable = [
        'nama',
        'nomor',
        'tanggal',
        'diwakilkan',
        'surat_kuasa',
        'pengambil',
        'ikatan_dinas',
        'bukti',
        'ttl',
        'keperluan',
        'type',
        'approve',
        'reason',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
