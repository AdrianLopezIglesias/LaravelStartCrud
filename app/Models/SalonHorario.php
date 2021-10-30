<?php

namespace App\Models;

use Eloquent as Model;
use App\Helpers\TimeHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SalonHorario
 * @package App\Models
 * @version October 10, 2021, 1:19 pm UTC
 *
 * @property integer $salon_id
 * @property string $dia
 * @property integer $hora_inicio
 * @property integer $hora_fin
 */
class SalonHorario extends Model
{

    use HasFactory;

    public $table = 'salon_horario';
    



    public $fillable = [
        'salon_id',
        'dia',
				'dia_semana',
        'hora_inicio',
        'hora_fin',
				'abierto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'salon_id' => 'integer',
        'dia' => 'date',
        'dia_semana' => 'integer',
        'hora_inicio' => 'integer',
        'hora_fin' => 'integer',
				'abierto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

		public function getAbiertoAttribute($val){
			if($val == "Si"){
				return "Abierto";
			}
			return "Cerrado";
		}
		public function getHoraInicioShowAttribute($value){
			if($this->hora_inicio == 0){
				return "";
			}
			return TimeHelper::getTime($this->hora_inicio/5, 0);
		}
		public function getHoraFinShowAttribute($value){
			if($this->hora_fin == 0){
				return "";
			}
			return TimeHelper::getTime($this->hora_fin/5, 0);
		}
		public function getDiaSemanaShowAttribute($value){
			return TimeHelper::weekDay($this->dia_semana);
		}
		public function salon() {
			return $this->hasOne(\App\Models\Salon::class, 'id', 'salon_id');
		}
    
}
