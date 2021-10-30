<?php

namespace App\Repositories;

use App\Models\ProfesionalHorario;
use App\Repositories\BaseRepository;

/**
 * Class ProfesionalHorarioRepository
 * @package App\Repositories
 * @version October 10, 2021, 1:23 pm UTC
*/

class ProfesionalHorarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'profesional_id',
        'salon_id',
        'dia',
        'hora_inicio',
        'hora_fin'
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
        return ProfesionalHorario::class;
    }
}
