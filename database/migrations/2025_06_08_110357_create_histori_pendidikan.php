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
        Schema::create('histori_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->cascadeOnDelete();
            $table->string('nama_sekolah');
            $table->enum('jenis_sekolah', ['SMA', 'SMK', 'MA']);
            $table->string('jurusan');
            $table->date('tanggal_masuk');
            $table->date('tanggal_lulus');
            $table->string('lokasi_sekolah');
            $table->float('nilai_akhir', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_pendidikan');
    }
};
