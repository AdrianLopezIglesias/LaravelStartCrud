<?php

namespace App\Repositories;

use App\Models\Teclados;
use App\Repositories\BaseRepository;

/**
 * Class TecladosRepository
 * @package App\Repositories
 * @version August 10, 2021, 12:49 am UTC
*/

class TecladosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'valor',
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
        return Teclados::class;
    }
}
