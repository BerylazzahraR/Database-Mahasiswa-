<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Database\Eloquent\Factories\Factory;

class DosenFactory extends Factory
{
    protected $model = Dosen::class;

    public function definition(): array
    {
        $nidn = (string) $this->faker->unique()->numerify('##########');

        return [
            'nidn' => $nidn,
            'nama' => 'Dr. ' . $this->faker->name(),
            'email' => $this->faker->unique()->userName() . '@lecturer.pnm.ac.id',
            'prodi_id' => Prodi::inRandomOrder()->value('id'),
        ];
    }
}
