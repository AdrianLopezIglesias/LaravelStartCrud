<?php

namespace App\Repositories;

use App\Models\SalonHorario;
use App\Repositories\BaseRepository;

/**
 * Class SalonHorarioRepository
 * @package App\Repositories
 * @version October 10, 2021, 1:19 pm UTC
*/

class SalonHorarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return SalonHorario::class;
    }
}
