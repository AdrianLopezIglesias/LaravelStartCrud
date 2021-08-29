<?php

namespace App\Repositories\Adm;

use App\Models\Adm\Texto;
use App\Repositories\BaseRepository;

/**
 * Class TextoRepository
 * @package App\Repositories\Adm
 * @version August 28, 2021, 8:32 pm UTC
*/

class TextoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'value',
        'es',
        'en',
        'l3',
        'l4'
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
        return Texto::class;
    }
}
