<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Empresa
 * @package App\Models
 * @version September 11, 2021, 2:11 pm UTC
 *
 * @property string $nombre
 * @property string $email
 * @property string $logotipo
 * @property string $sitioweb
 */
class Empresa extends Model
{


    public $table = 'empresas';
    



    public $fillable = [
        'nombre',
        'email',
        'logotipo',
        'sitioweb'
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
        'nombre' => 'required|max:255|min:5|unique:empresa',
        'email' => 'email'
    ];

    
}
