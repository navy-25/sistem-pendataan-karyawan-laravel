<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePwsPimpinanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pws_pimpinan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user');
            $table->string('nama_pegawai');
            $table->string('tanggal');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('kegiatan');
            $table->text('hasil_kegiatan');
            $table->string('jam_mulai');
            $table->string('menit_mulai');
            $table->string('jam_selesai');
            $table->string('menit_selesai');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('pws_pimpinan');
    }
}
