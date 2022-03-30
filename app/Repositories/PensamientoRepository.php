<?php

namespace App\Repositories;

use App\Models\Pensamiento;
use App\Repositories\BaseRepository;

/**
 * Class PensamientoRepository
 * @package App\Repositories
 * @version March 26, 2022, 1:44 am UTC
*/

class PensamientoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'texto',
        'metadata'
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
        return Pensamiento::class;
    }
}
