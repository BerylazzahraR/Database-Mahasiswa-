<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    /** @use HasFactory<\Database\Factories\DosenFactory> */
    use HasFactory;
    protected $fillable = ['nidn', 'nama', 'email', 'prodi_id'];

    public function prodi()
{
    return $this->belongsTo(\App\Models\Prodi::class);
}


    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
