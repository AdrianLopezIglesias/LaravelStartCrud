<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalHorarioTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional_horario', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('profesional_id')->unsigned();
            $table->unsignedBigInteger('salon_id')->unsigned();

            $table->date('dia')->nullable();

            $table->integer('hora_inicio');
            $table->integer('hora_fin');
						
            $table->integer('dia_semana');

            $table->longText('atiende');

            $table->timestamps();
            $table->foreign('profesional_id')->references('id')->on('profesionales');
            $table->foreign('salon_id')->references('id')->on('salones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profesional_horario');
    }
}
