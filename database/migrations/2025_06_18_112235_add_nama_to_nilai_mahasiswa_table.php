<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
    Schema::table('nilai_mahasiswa', function (Blueprint $table) {
        $table->string('nama')->after('id'); // atur posisi kolom jika perlu
    });
    }

    public function down():void
    {
    Schema::table('nilai_mahasiswa', function (Blueprint $table) {
        $table->dropColumn('nama');
    });
    }


    /**
     * Reverse the migrations.
     */
    
};
