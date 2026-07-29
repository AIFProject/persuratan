<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_masuk_id')
                ->constrained('surat_masuk')
                ->onDelete('cascade');
            $table->string('tujuan_disposisi');
            $table->text('isi_disposisi');
            $table->date('tanggal_disposisi');
            $table->enum('status', ['Belum diproses', 'Diproses', 'Selesai'])
                ->default('Belum diproses');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('disposisi');
    }
};
