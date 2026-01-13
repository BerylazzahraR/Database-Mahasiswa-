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
        Schema::table('mahasiswas', function (Blueprint $table) {
            //
        });Schema::table('mahasiswas', function (Blueprint $table) {
            $table->foreignId('prodi_id')->after('email')->constrained('prodis')->restrictOnDelete();
            $table->foreignId('dosen_id')->after('prodi_id')->constrained('dosens')->restrictOnDelete();

            $table->index(['prodi_id', 'angkatan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropConstrainedForeignId('dosen_id');
            $table->dropConstrainedForeignId('prodi_id');
            $table->dropIndex(['prodi_id', 'angkatan']);
        });
    }
};
