<?php

namespace App\Repositories\Adm;

use App\Models\Adm\Tecnologia;
use App\Repositories\BaseRepository;

/**
 * Class TecnologiaRepository
 * @package App\Repositories\Adm
 * @version August 28, 2021, 10:52 pm UTC
*/

class TecnologiaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'experiencia',
        'nombre',
        'area',
        'descripcion',
        'extra'
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
        return Tecnologia::class;
    }
}
