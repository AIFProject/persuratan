<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSifatSuratCatatanToDisposisiTable  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disposisi', function (Blueprint $table) {
            $table->enum('sifat_surat', [
                'Sangat Segera',
                'Segera',
                'Rahasia',
            ])->default('Sangat Segera')->after('tanggal_disposisi');

            $table->text('catatan')->nullable()->after('isi_disposisi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disposisi', function (Blueprint $table) {
            $table->dropColumn([
                'sifat_surat',
                'catatan'
            ]);
        });
    }
};
