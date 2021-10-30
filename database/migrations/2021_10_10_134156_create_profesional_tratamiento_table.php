<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalTratamientoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional_tratamiento', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('profesional_id')->unsigned();

            $table->unsignedBigInteger('tratamiento_id');
            $table->timestamps();
            $table->foreign('profesional_id')->references('id')->on('profesionales');
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profesional_tratamiento');
    }
}
