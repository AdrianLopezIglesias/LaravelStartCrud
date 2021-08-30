<?php

namespace App\Repositories\Adm;

use App\Models\Adm\Project;
use App\Repositories\BaseRepository;

/**
 * Class ProjectRepository
 * @package App\Repositories\Adm
 * @version August 29, 2021, 1:51 am UTC
*/

class ProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'title',
        'description',
        'tecnologias'
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
        return Project::class;
    }
}
