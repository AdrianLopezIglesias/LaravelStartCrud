<?php

namespace App\Repositories;

use App\Models\Mensaje;
use App\Repositories\BaseRepository;

/**
 * Class MensajeRepository
 * @package App\Repositories
 * @version August 24, 2021, 11:24 pm UTC
*/

class MensajeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'message',
        'other'
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
        return Mensaje::class;
    }
}
