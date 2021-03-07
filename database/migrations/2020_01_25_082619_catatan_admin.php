<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CatatanAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatan_admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('admin_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('lpj_id')->nullable();
            $table->string('catatan');
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
        Schema::dropIfExists('catatan_admin');
    }
}
