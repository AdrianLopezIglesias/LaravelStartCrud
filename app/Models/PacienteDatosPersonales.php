<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PacienteDatosPersonales
 * @package App\Models
 * @version October 14, 2021, 1:56 am UTC
 *
 * @property \App\Models\Pacientes $pacientes
 * @property integer $dni
 * @property string $fecha_nacimiento
 * @property string $domicilio
 * @property string $telefono_principal
 * @property integer $telefono_emergencias
 * @property string $genero
 * @property integer $paciente_id
 */
class PacienteDatosPersonales extends Model {

	use HasFactory;

	public $table = 'pacientes_datos_personales';




	public $fillable = [
		'dni',
		'fecha_nacimiento',
		'domicilio',
		'telefono_principal',
		'telefono_emergencias',
		'genero',
		'paciente_id'
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id' => 'integer',
		'dni' => 'string',
		'fecha_nacimiento' => 'string',
		'telefono_emergencias' => 'string',
		'genero' => 'string',
		'paciente_id' => 'integer'
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [
		'dni' => 'required',
		'fecha_nacimiento' => 'required',
		'domicilio' => 'required',
		'telefono_principal' => 'required'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 **/
	public function pacientes() {
		return $this->hasOne(\App\Models\Pacientes::class);
	}
}
