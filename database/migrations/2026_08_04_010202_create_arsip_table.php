<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arsip', function (Blueprint $table) {

            $table->id();

            // Relasi
            $table->foreignId('surat_masuk_id')
                ->nullable()
                ->constrained('surat_masuk')
                ->cascadeOnDelete();
            $table->unique('surat_masuk_id');
            $table->foreignId('surat_keluar_id')
                ->nullable()
                ->constrained('surat_keluar')
                ->cascadeOnDelete();
            $table->unique('surat_keluar_id');

            // Metadata file
            $table->string('nama_file');
            $table->string('mime_type');
            $table->unsignedBigInteger('ukuran_file');

            // Google Drive
            $table->string('google_drive_id')->nullable();
            $table->text('google_drive_link')->nullable();

            // User upload
            $table->foreignId('uploaded_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arsip');
    }
};
