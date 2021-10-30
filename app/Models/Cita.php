<?php

namespace App\Models;

use Eloquent as Model;
use App\Helpers\TimeHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cita
 * @package App\Models
 * @version September 26, 2021, 7:49 pm UTC
 *
 * @property string $inicio
 * @property string $fin
 * @property integer $asignacion_id
 * @property integer $tratamiento_id
 * @property integer $paciente_id
 */
class Cita extends Model {

	use HasFactory;

	public $table = 'citas';




	public $fillable = [
		'dia',
		'turno',
		'contratacion_id',
		'tratamiento_id',
		'paciente_id'
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id' => 'integer',
		'dia' => 'date',
		'turno' => 'integer',
		'contratacion_id' => 'integer',
		'tratamiento_id' => 'integer',
		'paciente_id' => 'integer'
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [];
	public function tratamiento() {
		return $this->hasOne(Tratamiento::class, 'id', 'tratamiento_id');
	}
	public function paciente() {
		return $this->hasOne(Pacientes::class, 'id', 'paciente_id');
	}
	public function profesional() {
		return $this->belongsToMany(Profesional::class);
	}

	public function getPacienteNombreAttribute() {
		return $this->paciente->nombre;
	}
	public function getProfesionalNombreAttribute() {
		return $this->paciente->nombre;
	}
	public function getTurnoShowAttribute() {
		return TimeHelper::getTime($this->turno);
	}
	public function getDiaShow() {
		return $this->dia->format("l d/m/Y");
	}
}
