<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class area
 * @package App\Models
 * @version November 13, 2021, 3:04 pm UTC
 *
 * @property string $nombre
 * @property string $descripcion
 */
class area extends Model
{


    public $table = 'areas';
    



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
