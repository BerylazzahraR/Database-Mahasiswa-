<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prodis', function (Blueprint $table) {
    $table->id();
    $table->string('kode', 10)->unique();   // TI, SI, dll
    $table->string('nama', 120);            // Teknologi Informasi
    $table->string('jenjang', 10)->default('D3'); // D3 / S1
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodis');
    }
};
