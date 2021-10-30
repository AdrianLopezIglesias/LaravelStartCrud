<?php

namespace App\Repositories;

use App\Models\Instalacion;
use App\Repositories\BaseRepository;

/**
 * Class InstalacionRepository
 * @package App\Repositories
 * @version October 10, 2021, 1:27 pm UTC
*/

class InstalacionRepository extends BaseRepository
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
        return Instalacion::class;
    }
}
