<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class IMEI
 * @package App\Models
 * @version August 12, 2021, 6:47 pm UTC
 *
 * @property \App\Models\Activacion $activacion
 * @property \Illuminate\Database\Eloquent\Collection $casos
 * @property \App\Models\Verificacion $verificacion
 * @property string $caso_numero
 * @property string $fecha_mail
 * @property string $asunto_mail
 * @property string $fecha_novedad
 * @property string $num_envio
 * @property string $LUGAR
 * @property string $MOTIVO
 * @property string $marca_modelo
 * @property string $IMEI
 * @property string $fecha_pedido
 * @property string $compania
 */
class IMEI extends Model
{


    public $table = 'imeis';
    



    public $fillable = [
        'caso_numero',
        'fecha_mail',
        'asunto_mail',
        'fecha_novedad',
        'num_envio',
        'LUGAR',
        'MOTIVO',
        'marca_modelo',
        'IMEI',
        'fecha_pedido',
        'compania'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'caso_numero' => 'string',
        'fecha_mail' => 'string',
        'asunto_mail' => 'string',
        'fecha_novedad' => 'string',
        'num_envio' => 'string',
        'LUGAR' => 'string',
        'MOTIVO' => 'string',
        'marca_modelo' => 'string',
        'IMEI' => 'string',
        'fecha_pedido' => 'string',
        'compania' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function activacion()
    {
        return $this->hasOne(\App\Models\Activacion::class, 'imei_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function casos()
    {
        return $this->hasMany(\App\Models\Caso::class, 'caso', 'caso_numero');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function verificacion()
    {
        return $this->hasOne(\App\Models\Verificacion::class, 'imeid_id', 'id');
    }
}
