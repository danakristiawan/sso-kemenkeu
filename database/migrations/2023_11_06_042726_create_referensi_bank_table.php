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
        Schema::create('referensi_bank', function (Blueprint $table) {
            $table->id();
            $table->string('kode_satker');
            $table->string('nama_satker');
            $table->string('nomor_rekening');
            $table->string('uraian_rekening');
            $table->string('jenis_rekening');
            $table->string('nama_bank');
            $table->string('surat_izin');
            $table->string('tanggal_surat');
            $table->string('status_rekening');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referensi_bank');
    }
};
