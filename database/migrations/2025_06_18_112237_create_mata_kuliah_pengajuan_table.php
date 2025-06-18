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
        Schema::create('mata_kuliah_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_studi_id')->constrained()->onDelete('cascade');
            $table->foreignId('mata_kuliah_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah_pengajuan');
    }
};
