<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Teclados
 * @package App\Models
 * @version August 10, 2021, 12:49 am UTC
 *
 * @property integer $valor
 * @property string $nombre
 */
class Teclados extends Model
{

    use HasFactory;

    public $table = 'teclados';
    



    public $fillable = [
        'valor',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'valor' => 'integer'
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
