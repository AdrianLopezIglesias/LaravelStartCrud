<?php

namespace App\Repositories;

use App\Models\Contratacion;
use App\Repositories\BaseRepository;

/**
 * Class ContratacionRepository
 * @package App\Repositories
 * @version September 26, 2021, 7:40 pm UTC
*/

class ContratacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tratamiento_id',
        'paciente_id',
        'valor_pagado'
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
        return Contratacion::class;
    }
}
