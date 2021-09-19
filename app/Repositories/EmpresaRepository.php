<?php

namespace App\Repositories;

use App\Models\Empresa;
use App\Repositories\BaseRepository;

/**
 * Class EmpresaRepository
 * @package App\Repositories
 * @version September 11, 2021, 2:11 pm UTC
*/

class EmpresaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'email',
        'logotipo',
        'sitioweb'
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
        return Empresa::class;
    }
}
