<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Profesional
 * @package App\Models
 * @version October 8, 2021, 7:03 pm UTC
 *
 * @property string $nombre
 */
class Profesional extends Model
{

    use HasFactory;

    public $table = 'profesionales';
    
		public static function boot() {
	    parent::boot();
	    static::created(function($item) {
	        \Log::info('Item Created Event:'.$item);
					$item->horarios()->saveMany([
						new ProfesionalHorario([ 'dia_semana' => 1, 'hora_inicio' => (9*60), 'hora_fin' => (20*60), 'atiende' => 'Si', 'salon_id' => 1 ]), 
						new ProfesionalHorario([ 'dia_semana' => 2, 'hora_inicio' => (9*60), 'hora_fin' => (20*60), 'atiende' => 'Si', 'salon_id' => 1 ]), 
						new ProfesionalHorario([ 'dia_semana' => 3, 'hora_inicio' => (9*60), 'hora_fin' => (20*60), 'atiende' => 'Si', 'salon_id' => 1 ]), 
						new ProfesionalHorario([ 'dia_semana' => 4, 'hora_inicio' => (9*60), 'hora_fin' => (20*60), 'atiende' => 'Si', 'salon_id' => 1 ]), 
						new ProfesionalHorario([ 'dia_semana' => 5, 'hora_inicio' => (9*60), 'hora_fin' => (20*60), 'atiende' => 'Si', 'salon_id' => 1 ]), 
						new ProfesionalHorario([ 'dia_semana' => 6, 'hora_inicio' => (9*60), 'hora_fin' => (20*60), 'atiende' => 'Si', 'salon_id' => 1 ]), 
						new ProfesionalHorario([ 'dia_semana' => 7, 'hora_inicio' => 0, 'hora_fin' => 0, 'atiende' => 'No', 'salon_id' => 1 ])
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
    public function citas(){
			return $this->belongsToMany(Cita::class);
		}
		public function horarios() {
			return $this->hasMany(\App\Models\ProfesionalHorario::class, 'profesional_id', 'id');
		}
		public function tratamientos() {
			return $this->hasMany(\App\Models\ProfesionalTratamiento::class, 'profesional_id', 'id');
		}
    
}
