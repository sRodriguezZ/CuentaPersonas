<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTotemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number_of');
            $table->integer('floor');

            //FK_Sede
            $table->integer('headquarter_id')->unsigned()->nullable();
            $table->foreign('headquarter_id')->references('id')->on('headquarters');

            //FK_Cuadro
            $table->integer('picture_id')->unsigned()->nullable();
            $table->foreign('picture_id')->references('id')->on('pictures');
            //FK_Camara
            $table->integer('camera_id')->unsigned()->nullable();
            $table->foreign('camera_id')->references('id')->on('cameras');
            //FK_Ultrasonido
            $table->integer('ultrasound_id')->unsigned()->nullable();
            $table->foreign('ultrasound_id')->references('id')->on('ultrasounds');

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
        Schema::dropIfExists('totems');
    }
}
