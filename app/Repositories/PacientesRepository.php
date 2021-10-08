<?php

namespace App\Repositories;

use App\Models\Pacientes;
use App\Repositories\BaseRepository;

/**
 * Class PacientesRepository
 * @package App\Repositories
 * @version September 26, 2021, 7:51 pm UTC
*/

class PacientesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return Pacientes::class;
    }
}
