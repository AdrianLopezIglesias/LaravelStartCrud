<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstalacionesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalaciones', function (Blueprint $table) {
					$table->bigIncrements('id');
					$table->unsignedBigInteger('instalacion_tipo_id');
					$table->unsignedBigInteger('salon_id');
					$table->timestamps();
					// $table->foreign('instalacion_tipo_id')->references('id')->on('instalacion_tipo');
					// $table->foreign('salon_id')->references('id')->on('salones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('instalaciones');
    }
}
