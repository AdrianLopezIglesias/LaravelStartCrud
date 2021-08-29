<?php

namespace App\Models\Adm;

use Eloquent as Model;



/**
 * Class Tecnologia
 * @package App\Models\Adm
 * @version August 28, 2021, 10:52 pm UTC
 *
 * @property string $experiencia
 * @property string $nombre
 * @property string $area
 * @property string $descripcion
 * @property string $extra
 */
class Tecnologia extends Model
{


    public $table = 'tecnologias';
    



    public $fillable = [
        'experiencia',
        'nombre',
        'area',
        'descripcion',
        'extra'
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
