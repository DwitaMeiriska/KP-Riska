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
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Foreign key to users, nullable
            $table->string('judul'); // Kolom nomor_surat
            $table->string('tujuan'); // Kolom nomor_surat
            $table->string('pengirim'); // Kolom nomor_surat
            $table->string('kode_surat', 50); // Kolom kode_surat
            $table->date('tanggal_surat'); // Kolom tanggal_surat
            $table->string('no_surat', 100); // Kolom no_surat
            $table->string('jenis_surat'); // Kolom no_surat
            $table->string('file_surat'); // Kolom untuk menyimpan file surat (misalnya path file)
            $table->enum('status', ['masuk', 'keluar']); // Enum untuk status (masuk/keluar)
            $table->enum('acc', ['ya', 'tidak'])->default('tidak'); // Enum untuk status acc (ya/tidak)
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
