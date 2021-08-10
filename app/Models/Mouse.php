<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Mouse
 * @package App\Models
 * @version August 10, 2021, 12:56 am UTC
 *
 * @property string $nombre
 */
class Mouse extends Model
{


    public $table = 'mice';
    



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

    public $timestamps = false; 

    
}
