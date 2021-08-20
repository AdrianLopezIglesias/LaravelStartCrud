<?php

namespace App\Repositories;

use App\Models\IMEI;
use App\Repositories\BaseRepository;

/**
 * Class IMEIRepository
 * @package App\Repositories
 * @version August 12, 2021, 6:47 pm UTC
*/

class IMEIRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return IMEI::class;
    }
}
