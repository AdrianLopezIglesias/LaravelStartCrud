<?php

namespace App\Models\Adm;

use Eloquent as Model;



/**
 * Class Texto
 * @package App\Models\Adm
 * @version August 28, 2021, 8:32 pm UTC
 *
 * @property string $value
 * @property string $es
 * @property string $en
 * @property string $l3
 * @property string $l4
 */
class Texto extends Model
{


    public $table = 'textos';
    



    public $fillable = [
        'value',
        'es',
        'en',
        'l3',
        'l4'
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
