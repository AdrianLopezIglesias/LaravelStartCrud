<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesDatosPersonalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('pacientes_datos_personales', function (Blueprint $table) {
			$table->increments('id');
			$table->longText('dni')->nullable();
			$table->longText('fecha_nacimiento')->nullable();
			$table->longText('domicilio')->nullable();
			$table->longText('telefono_principal')->nullable();
			$table->longText('telefono_emergencias')->nullable();
			$table->string('genero')->nullable();
			$table->integer('paciente_id')->unsigned();
			$table->timestamps();
		});
		// Schema::table('pacientes_datos_personales', function (Blueprint $table) {
		// 	$table->foreign('paciente_id')->references('id')->on('Pacientes');
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('pacientes_datos_personales');
	}
}
