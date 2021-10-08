<?php

namespace App\Repositories;

use App\Models\Cita;
use App\Repositories\BaseRepository;

/**
 * Class CitaRepository
 * @package App\Repositories
 * @version September 26, 2021, 7:49 pm UTC
*/

class CitaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'inicio',
        'fin',
        'asignacion_id',
        'tratamiento_id',
        'paciente_id'
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
        return Cita::class;
    }
}
