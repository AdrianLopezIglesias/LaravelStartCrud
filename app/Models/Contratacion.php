<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contratacion
 * @package App\Models
 * @version September 26, 2021, 7:40 pm UTC
 *
 * @property integer $tratamiento_id
 * @property integer $paciente_id
 * @property integer $valor_pagado
 */
class Contratacion extends Model
{

    use HasFactory;

    public $table = 'contrataciones';
    



    public $fillable = [
        'tratamiento_id',
        'paciente_id',
        'valor_pagado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tratamiento_id' => 'integer',
        'paciente_id' => 'integer',
        'valor_pagado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

  public function paciente() {
    return $this->hasOne(\App\Models\Paciente::class, 'id', 'paciente_id');
  }
  public function tratamiento() {
    return $this->hasOne(\App\Models\Tratamiento::class, 'id', 'tratamiento_id');
  }
  public function citas() {
    return $this->hasMany(\App\Models\Cita::class, 'contratacion_id', 'id');
  }

    
}
