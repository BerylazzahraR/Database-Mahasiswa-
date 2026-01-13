<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
    'nim','nama','email','prodi_id','dosen_id','angkatan','tanggal_lahir','alamat',
];
public function prodi()
{
    return $this->belongsTo(Prodi::class);
}

public function dosen()
{
    return $this->belongsTo(Dosen::class);
}

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
