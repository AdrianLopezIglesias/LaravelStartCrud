<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Helpers\StringHelper;

/**
 * Class Pacientes
 * @package App\Models
 * @version September 26, 2021, 7:51 pm UTC
 *
 * @property string $nombre
 */
class Paciente extends Model
{
    use HasFactory;
    
    public $table = 'pacientes';

    
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = StringHelper::removeEverything(mb_strtolower($value));
    }


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
                'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    public function datospersonales()
    {
        return $this->hasOne(PacienteDatosPersonales::class, 'paciente_id', 'id');
    }
        
    public function contrataciones()
    {
        return $this->hasMany(Contratacion::class, 'paciente_id', 'id');
    }
    public function citas()
    {
        return $this->hasMany(Cita::class, 'paciente_id', 'id');
    }
    public function tratamientos()
    {
        return $this->hasManyThrough(
            \App\Models\Tratamiento::class,  //Profesional
                \App\Models\Contratacion::class, //ProfesionalHorario
                'tratamiento_id', // Foreign key on the ProfesionalHorario table...
                'id', // Foreign key on the Profesional table...
                'id', // Local key on the Salon table...
                'paciente_id' // Local key on the ProfesionalHorario table...
        );
    }

    // public function setNombreAttribute($value)
    // {
    //     $this->attributes['nombre'] = StringHelper::remove_accents(strtolower($value));
    // }


    public function getNombreAttribute($value)
    {
        return ucfirst($value);
    }
    // public function tratamientos(){
    //     return $this->hasMany(Cita::class, 'paciente_id', 'id');
    // }
}