<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20)->unique();
            $table->string('nama', 120);
            $table->string('email')->unique();
            $table->string('jurusan', 120);
            $table->unsignedSmallInteger('angkatan'); // contoh: 2022
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();

            $table->index(['jurusan', 'angkatan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
