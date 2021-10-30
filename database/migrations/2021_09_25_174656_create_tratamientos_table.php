<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::create('tratamientos', function (Blueprint $table) {
			$table->bigIncrements('id');
      $table->longText('nombre')->nullable();

      $table->longText('descripcion')->nullable();
      $table->longText('descripcion_corta')->nullable();
      $table->longText('imagen_principal')->nullable();

      $table->integer('sesiones')->nullable();
      $table->integer('duracion')->nullable();

      $table->integer('valor')->nullable();
      $table->boolean('activo')->nullable();

			$table->timestamps();
			$table->softDeletes();
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tratamientos');
    }
}
