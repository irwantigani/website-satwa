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
    Schema::create('hewan_masuk', function (Blueprint $table) {
        $table->id();
        $table->string('jenis_hewan');
        $table->string('asal_hewan');
        $table->string('kondisi_kesehatan');
        $table->date('tanggal_masuk');
        $table->string('pemilik_pengantar');
        $table->text('keterangan')->nullable();
        $table->string('dokumen')->nullable();
        $table->timestamps();
    });
    
}

public function down()
{
    Schema::dropIfExists('hewan_masuk');
}

};
