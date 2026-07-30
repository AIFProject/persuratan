<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->unique();
            $table->date('tanggal_surat');
            $table->date('tanggal_diterima');
            $table->string('pengirim');
            $table->string('perihal');
            $table->string('sifat_surat');
            $table->string('klasifikasi');
            $table->string('file_surat')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('file_drive_id')->nullable();
            $table->string('file_name')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_masuk');
    }
};
