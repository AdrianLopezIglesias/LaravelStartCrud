<?php

namespace App\Models\Adm;

use Eloquent as Model;



/**
 * Class Projectimage
 * @package App\Models\Adm
 * @version August 30, 2021, 11:51 pm UTC
 *
 * @property \App\Models\Adm\Project $id
 * @property string $url
 * @property string $project_id
 */
class Projectimage extends Model
{


    public $table = 'projectimages';
    



    public $fillable = [
        'url',
        'project_id'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function id()
    {
        return $this->belongsTo(\App\Models\Adm\Project::class, 'id', 'project_id');
    }
    public function getTitleenAttribute() {
        return \App\Models\Adm\Texto::where('value', 'projectimage' . $this->id . '.title')->first()->en;
    }
    public function getTitleesAttribute() {
        return \App\Models\Adm\Texto::where('value', 'projectimage' . $this->id . '.title')->first()->es;
    }
    public function getDescriptionenAttribute() {
        return \App\Models\Adm\Texto::where('value', 'projectimage' . $this->id . '.description')->first()->en;
    }
    public function getDescriptionesAttribute() {
        return \App\Models\Adm\Texto::where('value', 'projectimage' . $this->id . '.description')->first()->es;
    }
}
