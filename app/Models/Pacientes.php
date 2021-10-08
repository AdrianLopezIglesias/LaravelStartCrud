<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pacientes
 * @package App\Models
 * @version September 26, 2021, 7:51 pm UTC
 *
 * @property string $nombre
 */
class Pacientes extends Model
{

    use HasFactory;

    public $table = 'pacientes';
    



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

    public function contrataciones(){
        return $this->hasMany(Contratacion::class, 'paciente_id', 'id');
    }
    public function citas(){
        return $this->hasMany(Cita::class, 'paciente_id', 'id');
    }


}
