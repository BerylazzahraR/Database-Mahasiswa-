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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nidn', 20)->unique();
            $table->string('nama', 120);
            $table->string('email')->unique()->nullable();
            $table->foreignId('prodi_id')->nullable()->constrained('prodis')->nullOnDelete(); 
            $table->timestamps();

            $table->index(['prodi_id', 'nama']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
