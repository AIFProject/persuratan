<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keputusan', function (Blueprint $table) {
            $table->id();

            $table->string('nomor_sk')->unique();
            $table->string('nama_sk');
            $table->date('tanggal');
            $table->string('perihal');

            $table->string('file_sk')->nullable();

            $table->string('google_drive_id')->nullable();
            $table->string('google_drive_url')->nullable();

            $table->foreignId('created_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keputusans');
    }
};
