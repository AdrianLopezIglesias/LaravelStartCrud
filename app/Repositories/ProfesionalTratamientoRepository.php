<?php

namespace App\Repositories;

use App\Models\ProfesionalTratamiento;
use App\Repositories\BaseRepository;

/**
 * Class ProfesionalTratamientoRepository
 * @package App\Repositories
 * @version October 10, 2021, 1:41 pm UTC
*/

class ProfesionalTratamientoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'profesional_id',
        'tratamiendo_id'
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
        return ProfesionalTratamiento::class;
    }
}
