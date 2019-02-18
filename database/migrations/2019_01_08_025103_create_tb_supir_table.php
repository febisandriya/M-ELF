<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSupirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tb_supir', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('username');
          $table->string('password');
          $table->integer('mobil_id')->unsigned();
          $table->timestamps();

          $table->foreign('mobil_id')->references('id')->on('tb_mobil')
            ->onDelete('cascade')
            ->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_supir');
    }
}
