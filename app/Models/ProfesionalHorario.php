<?php

namespace App\Models;

use App\Helpers\TimeHelper;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProfesionalHorario
 * @package App\Models
 * @version October 10, 2021, 1:23 pm UTC
 *
 * @property integer $profesional_id
 * @property integer $salon_id
 * @property string $dia
 * @property integer $hora_inicio
 * @property integer $hora_fin
 */
class ProfesionalHorario extends Model {

	use HasFactory;

	public $table = 'profesional_horario';




	public $fillable = [
		'profesional_id',
		'salon_id',
		'dia',
		'hora_inicio',
		'hora_fin',
		'atiende' 
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'id' => 'integer',
		'profesional_id' => 'integer',
		'salon_id' => 'integer',
		'dia' => 'date',
		'hora_inicio' => 'integer',
		'hora_fin' => 'integer',
		'atiende' => 'string'
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [];
	public function getAbiertoAttribute($val) {
		return $val;
	}
	public function getHoraInicioShowAttribute($value) {
		if ($this->atiende == "No") {
			return "";
			if ($this->hora_inicio == 0) {
				return "";
			}
		}
		return TimeHelper::getTime($this->hora_inicio / 5, 0);
	}
	public function getHoraFinShowAttribute($value) {
		if ($this->atiende == "No") {
			return "";
			if ($this->hora_fin == 0) {
				return "";
			}
		}
		return TimeHelper::getTime($this->hora_fin / 5, 0);
	}
	public function getDiaSemanaShowAttribute($value) {
		return TimeHelper::weekDay($this->dia_semana);
	}
	public function salon() {
		return $this->hasOne(\App\Models\Salon::class, 'id', 'salon_id');
	}
	public function profesional() {
		return $this->hasOne(\App\Models\Salon::class, 'id', 'profesional_id');
	}
}
