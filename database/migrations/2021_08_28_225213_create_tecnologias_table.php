<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnologiasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnologias', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('experiencia');
            $table->longText('nombre');
            $table->longText('area');
            $table->longText('descripcion');
            $table->longText('extra');
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
        Schema::drop('tecnologias');
    }
}
