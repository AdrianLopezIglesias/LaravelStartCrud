<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProfesionalTratamiento
 * @package App\Models
 * @version October 10, 2021, 1:41 pm UTC
 *
 * @property integer $profesional_id
 * @property integer $tratamiendo_id
 */
class ProfesionalTratamiento extends Model
{

    use HasFactory;

    public $table = 'profesional_tratamiento';
    



    public $fillable = [
        'profesional_id',
        'tratamiento_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'profesional_id' => 'integer',
        'tratamiento_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
		public function tratamiento() {
			return $this->hasOne(\App\Models\Tratamiento::class, 'id', 'tratamiento_id');
		}
		public function profesional() {
			return $this->hasOne(\App\Models\Profesional::class, 'id', 'profesional_id');
		}
    
}
