<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Tratamiento
 * @package App\Models
 * @version September 25, 2021, 5:51 pm UTC
 *
 * @property string $nombre
 * @property string $descripcion
 * @property string $descripcion_corta
 * @property string $area
 * @property string $sesiones
 * @property string $valor
 * @property string $activo
 * @property string $profesional
 * @property string $equipamiento
 * @property string $imagen_principal
 */
class Tratamiento extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tratamientos';
    

    protected $dates = ['deleted_at'];

    public function getReferenceValue(){
      return "{$this->nombre} ({$this->valor})";
    } 

    public $fillable = [
        'nombre',
        'descripcion',
        'descripcion_corta',
        'area',
        'sesiones',
        'valor',
        'activo',
        'profesional',
        'equipamiento',
        'imagen_principal'
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
        'nombre' => 'required',
        'descripcion' => 'required',
        'descripcion_corta' => 'required',
        'area' => 'required',
        'sesiones' => 'required',
        'valor' => 'required',
        'activo' => 'required'
    ];


    
}
