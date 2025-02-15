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
        Schema::create('hewan_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_hewan');
            $table->string('asal_hewan');
            $table->string('kondisi_kesehatan');
            $table->date('tanggal_keluar');
            $table->string('pemilik_pengantar');
            $table->text('keterangan')->nullable();
            $table->string('dokumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hewan_keluar');
    }
};
