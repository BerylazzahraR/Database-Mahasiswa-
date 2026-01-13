<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    /** @use HasFactory<\Database\Factories\ProdiFactory> */
    use HasFactory;
     protected $fillable = ['kode', 'nama', 'jenjang'];

   public function mahasiswas()
{
    return $this->hasMany(\App\Models\Mahasiswa::class);
}

public function dosens()
{
    return $this->hasMany(\App\Models\Dosen::class);
}

}
