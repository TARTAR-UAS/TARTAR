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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('npm')->nullable()->unique();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghucu']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->mediumText('alamat');
            $table->string('no_telp');
            $table->year('angkatan')->nullable();
            $table->string('program_studi');
            $table->string('fakultas');
            $table->enum('status_perkuliahan', ['Aktif', 'Cuti', 'Lulus', 'Dropout'])->nullable();
            $table->enum('status_akun', ['Pending', 'Verified', 'Rejected'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
