<?php

namespace App\Repositories;

use App\Models\area;
use App\Repositories\BaseRepository;

/**
 * Class areaRepository
 * @package App\Repositories
 * @version November 13, 2021, 3:04 pm UTC
*/

class areaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
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
        return area::class;
    }
}
