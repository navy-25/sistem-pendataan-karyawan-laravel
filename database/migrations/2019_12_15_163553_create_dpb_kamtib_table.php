<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpbKamtibTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpb_kamtib', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user');
            $table->bigInteger('tanggal');
            $table->string('bulan');
            $table->bigInteger('tahun');
            $table->string('nama_deteni');
            $table->string('blok');
            $table->text('jenis_pelanggaran')->nullable();
            $table->string('foto')->nullable();
            $table->string('kasus');
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
        Schema::dropIfExists('dpb_kamtib');
    }
}
