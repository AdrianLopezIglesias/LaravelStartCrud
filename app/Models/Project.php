<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Project
 * @package App\Models
 * @version August 24, 2021, 12:49 pm UTC
 *
 * @property string $name
 * @property string $images
 * @property string $title
 * @property string $description
 * @property string $tecnologies
 * @property string $url
 * @property string $repository
 * @property string $access_user
 * @property string $access_password
 * @property string $other_1
 * @property string $other_2
 */
class Project extends Model
{


    public $table = 'proyectos';

  public $timestamps = false; 



    public $fillable = [
        'name',
        'images',
        'title',
        'description',
        'tecnologies',
        'url',
        'repository',
        'access_user',
        'access_password',
        'other_1',
        'other_2'
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

    
}
