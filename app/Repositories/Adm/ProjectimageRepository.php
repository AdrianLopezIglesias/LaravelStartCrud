<?php

namespace App\Repositories\Adm;

use App\Models\Adm\Projectimage;
use App\Repositories\BaseRepository;

/**
 * Class ProjectimageRepository
 * @package App\Repositories\Adm
 * @version August 30, 2021, 11:51 pm UTC
*/

class ProjectimageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'url',
        'project_id'
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
        return Projectimage::class;
    }
}
