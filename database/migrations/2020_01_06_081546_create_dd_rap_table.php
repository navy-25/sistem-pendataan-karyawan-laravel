<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdRapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dd_rap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user');
            $table->string('nama_deteni');
            $table->string('tanggal');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('no_identitas');
            $table->string('jenis_kelamin');
            $table->string('blok');
            $table->string('kewarganegaraan');
            $table->text('jenis_pelanggaran');
            $table->string('asal_kiriman');
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
        Schema::dropIfExists('dd_rap');
    }
}
