<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisudaTable extends Migration
{
    public function up()
    {
        Schema::create('wisuda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->onDelete('cascade');  // Ini sudah cukup
            $table->text('status');  // Status wisuda
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wisuda');
    }
}