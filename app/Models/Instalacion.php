<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Instalacion
 * @package App\Models
 * @version October 10, 2021, 1:27 pm UTC
 *
 * @property string $nombre
 * @property string $descripcion
 */
class Instalacion extends Model
{

    use HasFactory;

    public $table = 'instalacion_tipo';
    



    public $fillable = [
        'nombre',
        'descripcion'
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

    
}
