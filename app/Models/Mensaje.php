<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Mensaje
 * @package App\Models
 * @version August 24, 2021, 11:24 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $message
 * @property string $other
 */
class Mensaje extends Model
{


    public $table = 'mensajes';
    



    public $fillable = [
        'name',
        'email',
        'message',
        'other'
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
