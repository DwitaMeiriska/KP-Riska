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
        Schema::create('surat_izins', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('nisn');
            $table->string('kelas')->nullable();
            $table->string('keterangan')->nullable();
            $table->enum('status', ['terima', 'tolak','belum'])->nullable()->default('belum');
            $table->string('lampiran')->nullable();
            // $table->foreignId('id_surat')->nullable()->constrained('surats')->onDelete('cascade');
            $table->foreignId('id_surat')->nullable()->constrained('surats', 'id_surat')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_izins');
    }
};
