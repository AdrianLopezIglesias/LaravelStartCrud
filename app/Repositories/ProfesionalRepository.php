<?php

namespace App\Repositories;

use App\Models\Profesional;
use App\Repositories\BaseRepository;

/**
 * Class ProfesionalRepository
 * @package App\Repositories
 * @version October 8, 2021, 7:03 pm UTC
*/

class ProfesionalRepository extends BaseRepository
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
        return Profesional::class;
    }
}
