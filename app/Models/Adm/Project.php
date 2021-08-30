<?php

namespace App\Models\Adm;

use Eloquent as Model;



/**
 * Class Project
 * @package App\Models\Adm
 * @version August 29, 2021, 1:51 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $projectimages
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $tecnologias
 */
class Project extends Model
{


    public $table = 'projects';
    



    public $fillable = [
        'name',
        'title',
        'description',
        'tecnologias'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function projectimages()
    {
        return $this->hasMany(\App\Models\Adm\Projectimage::class, 'project_id', 'id');
    }
}
