<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
    'nim','nama','email','jurusan','angkatan','tanggal_lahir','alamat',
];


    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
