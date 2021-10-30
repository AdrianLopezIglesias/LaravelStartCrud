<?php

namespace App\Repositories;

use App\Models\Salon;
use App\Repositories\BaseRepository;

/**
 * Class SalonRepository
 * @package App\Repositories
 * @version October 10, 2021, 1:14 pm UTC
*/

class SalonRepository extends BaseRepository
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
        return Salon::class;
    }
}
