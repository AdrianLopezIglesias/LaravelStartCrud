<?php

namespace App\Repositories;

use App\Models\PacienteDatosPersonales;
use App\Repositories\BaseRepository;

/**
 * Class PacienteDatosPersonalesRepository
 * @package App\Repositories
 * @version October 14, 2021, 1:56 am UTC
*/

class PacienteDatosPersonalesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dni',
        'fecha_nacimiento',
        'domicilio',
        'telefono_principal',
        'telefono_emergencias',
        'genero',
        'pacientes_id'
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
        return PacienteDatosPersonales::class;
    }
}
