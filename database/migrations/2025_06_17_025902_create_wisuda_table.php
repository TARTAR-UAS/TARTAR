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
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->onDelete('cascade');  
            $table->float('ipk_akhir', 3, 2); 
            $table->date('tanggal_pengajuan');
            $table->text('status');  
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wisuda');
    }
}