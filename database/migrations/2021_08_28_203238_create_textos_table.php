<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textos', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('value');
            $table->longText('es');
            $table->longText('en');
            $table->longText('l3');
            $table->longText('l4');
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
        Schema::drop('textos');
    }
}
