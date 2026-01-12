<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    protected $model = Mahasiswa::class;

    public function definition(): array
{
    $nim = (string) $this->faker->unique()->numerify('##########');

    return [
        'nim' => $nim,
        'nama' => $this->faker->name(),
        'email' => $nim . '@student.pnm.ac.id',
        'jurusan' => $this->faker->randomElement([
            'Teknologi Informasi','Informatika','Sistem Informasi','Teknik Elektro','Manajemen'
        ]),
        'angkatan' => $this->faker->numberBetween(2019, 2026),
        'tanggal_lahir' => $this->faker->dateTimeBetween('-25 years', '-17 years')->format('Y-m-d'),
        'alamat' => $this->faker->address(),
    ];
}

}
