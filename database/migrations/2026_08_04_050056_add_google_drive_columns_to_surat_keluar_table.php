<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surat_keluar', function (Blueprint $table) {

            $table->string('google_drive_id')->nullable();

            $table->string('google_drive_url')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('surat_keluar', function (Blueprint $table) {

            $table->dropColumn([
                'google_drive_id',
                'google_drive_url',
            ]);

        });
    }
};
