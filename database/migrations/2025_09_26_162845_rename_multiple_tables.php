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
        Schema::rename('peserta_didiks', 'pesertadidiks');
        Schema::rename('daftar_hadirs', 'daftarhadirs');
        Schema::rename('soal_ulangans', 'soalulangans');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('pesertadidiks', 'peserta_didiks');
        Schema::rename('daftarhadirs', 'daftar_hadirs');
        Schema::rename('soalulangans', 'soal_ulangans');
    }
};
