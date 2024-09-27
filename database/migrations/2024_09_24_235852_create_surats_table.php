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
        Schema::create('surats', function (Blueprint $table) {
            $table->id('id_surat'); // Primary key id_surat
            $table->string('user_id');
            $table->string('kode_surat', 50); // Kolom kode_surat
            $table->date('tanggal_surat'); // Kolom tanggal_surat
            $table->string('no_surat', 100); // Kolom no_surat
            $table->string('file_surat'); // Kolom untuk menyimpan file surat (misalnya path file)
            $table->enum('status', ['masuk', 'keluar']); // Enum untuk status (masuk/keluar)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
