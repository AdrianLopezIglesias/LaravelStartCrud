<?php

namespace App\Models\Adm;

use Eloquent as Model;



/**
 * Class Project
 * @package App\Models\Adm
 * @version August 30, 2021, 4:42 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $images
 * @property string $url
 * @property string $repositoryy
 * @property string $techs
 * @property string $mainimage
 */
class Project extends Model
{


    public $table = 'projects';
    



    public $fillable = [
        'url',
        'repositoryy',
        'techs',
        'mainimage'
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
    public function images()
    {
        return $this->hasMany(\App\Models\Adm\Projectimage::class, 'project_id', 'id');
    }
    public function getTitleenAttribute()
    {
        return \App\Models\Adm\Texto::where('value', 'project'.$this->id.'.title')->first()->en;
    }
    public function getTitleesAttribute()
    {
        return \App\Models\Adm\Texto::where('value', 'project'.$this->id.'.title')->first()->es;
    }
    public function getDescriptionenAttribute()
    {
        return \App\Models\Adm\Texto::where('value', 'project'.$this->id.'.description')->first()->en;
    }
    public function getDescriptionesAttribute()
    {
        return \App\Models\Adm\Texto::where('value', 'project'.$this->id.'.description')->first()->es;
    }
}
