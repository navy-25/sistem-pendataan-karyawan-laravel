<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpjKamtibTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lpj_kamtib', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user');
            $table->string('tanggal');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('nama_petugas');
            $table->string('jam_mulai');
            $table->string('menit_mulai');
            $table->string('jam_selesai');
            $table->string('menit_selesai');
            $table->text('deskripsi')->nullable();
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('lpj_kamtib');
    }
}
