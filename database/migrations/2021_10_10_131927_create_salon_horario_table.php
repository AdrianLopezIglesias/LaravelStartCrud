<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonHorarioTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_horario', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('salon_id');

            $table->date('dia')->nullable();

            $table->integer('hora_inicio');
            $table->integer('hora_fin');

            $table->integer('dia_semana');
						
            $table->timestamps();

            $table->longText('abierto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('salon_horario');
    }
}
