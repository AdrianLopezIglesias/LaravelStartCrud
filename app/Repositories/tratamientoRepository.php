<?php

namespace App\Repositories;

use App\Models\Tratamiento;
use App\Repositories\BaseRepository;

/**
 * Class TratamientoRepository
 * @package App\Repositories
 * @version September 25, 2021, 5:51 pm UTC
*/

class TratamientoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'descripcion_corta',
        'area',
        'sesiones',
        'valor',
        'activo',
        'profesional',
        'equipamiento',
        'imagen_principal'
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
        return Tratamiento::class;
    }
}
