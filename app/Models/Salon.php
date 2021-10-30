<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\SalonHorario; 
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Salon
 * @package App\Models
 * @version October 10, 2021, 1:14 pm UTC
 *
 * @property string $nombre
 */
class Salon extends Model
{

    use HasFactory;

    public $table = 'salones';
    
    public static function boot() {
	    parent::boot();
	    static::created(function($item) {
	        \Log::info('Item Created Event:'.$item);
					$item->horarios()->saveMany([
						new SalonHorario([ 'dia_semana' => 1, 'hora_inicio' => (9*60), 'hora_fin' => (20*60), 'abierto' => 'Si' ]), 
						new SalonHorario([ 'dia_semana' => 2, 'hora_inicio' => (9*60), 'hora_fin' => (20*60), 'abierto' => 'Si' ]), 
						new SalonHorario([ 'dia_semana' => 3, 'hora_inicio' => (9*60), 'hora_fin' => (20*60), 'abierto' => 'Si' ]), 
						new SalonHorario([ 'dia_semana' => 4, 'hora_inicio' => (9*60), 'hora_fin' => (20*60), 'abierto' => 'Si' ]), 
						new SalonHorario([ 'dia_semana' => 5, 'hora_inicio' => (9*60), 'hora_fin' => (20*60), 'abierto' => 'Si' ]), 
						new SalonHorario([ 'dia_semana' => 6, 'hora_inicio' => (9*60), 'hora_fin' => (20*60), 'abierto' => 'Si' ]), 
						new SalonHorario([ 'dia_semana' => 7, 'hora_inicio' => 0, 'hora_fin' => 0, 'abierto' => 'No' ])
					]);
	    });
	    static::creating(function($item) {
	        \Log::info('Item Creating Event:'.$item);
	    });
	}



    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
		public function horarios() {
			return $this->hasMany(\App\Models\SalonHorario::class, 'salon_id', 'id');
		}
		public function profesionalHorario(){
			return $this->hasMany(ProfesionalHorario::class, 'salon_id', 'id');
		}
		public function profesionales() {
			return $this->hasManyThrough(
				\App\Models\Profesional::class, 
				\App\Models\ProfesionalHorario::class,
				'salon_id', // Foreign key on the ProfesionalHorario table...
				'id', // Foreign key on the Profesional table...
				'id', // Local key on the Salon table...
				'profesional_id' // Local key on the ProfesionalHorario table...
			);
		}
		public function tratamientos() {
			return $this->hasManyThrough(
				\App\Models\ProfesionalTratamiento::class, 
				\App\Models\ProfesionalHorario::class,
				'salon_id', // Foreign key on the ProfesionalHorario table...
				'profesional_id', // Foreign key on the ProfesionalTratamiento table...
				'id', // Local key on the Salon table...
				'profesional_id' // Local key on the ProfesionalHorario table...
			);
		}

    
}
