<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpmRapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpm_rap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user');
            $table->string('nama_pengungsi');
            $table->string('nomor_register');
            $table->string('no_unchcr');
            $table->string('jenis_kelamin');
            $table->string('tanggal');
            $table->string('bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('alamat');
            $table->string('kewarganegaraan');
            $table->string('tahun_registrasi')->nullable();
            $table->string('foto')->nullable();
            $table->string('barcode')->nullable();
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
        Schema::dropIfExists('dpm_rap');
    }
}
