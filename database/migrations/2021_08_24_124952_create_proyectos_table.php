<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('name');
            $table->longText('images');
            $table->longText('title');
            $table->longText('description');
            $table->longText('tecnologies');
            $table->longText('url');
            $table->longText('repository');
            $table->longText('access_user');
            $table->longText('access_password');
            $table->longText('other_1');
            $table->longText('other_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proyectos');
    }
}
