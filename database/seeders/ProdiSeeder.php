<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;


class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        Prodi::insert([
            ['kode' => 'TI', 'nama' => 'Teknologi Informasi', 'jenjang' => 'D3', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => 'SI', 'nama' => 'Sistem Informasi', 'jenjang' => 'S1', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => 'TE', 'nama' => 'Teknik Elektro', 'jenjang' => 'D3', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => 'MN', 'nama' => 'Manajemen', 'jenjang' => 'S1', 'created_at' => now(), 'updated_at' => now()],
        ]);
        //
    }
}
