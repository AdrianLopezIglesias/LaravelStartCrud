<?php

namespace App\Repositories;

use App\Models\Mouse;
use App\Repositories\BaseRepository;

/**
 * Class MouseRepository
 * @package App\Repositories
 * @version August 10, 2021, 12:56 am UTC
*/

class MouseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Mouse::class;
    }
}
