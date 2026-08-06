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
        Schema::table('surat_keputusan', function (Blueprint $table) {
            $table->string('google_drive_id')->nullable()->after('file_sk');
            $table->string('google_drive_url')->nullable()->after('google_drive_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_keputusan', function (Blueprint $table) {
            $table->dropColumn([
                'google_drive_id',
                'google_drive_url'
            ]);
        });
    }
};
