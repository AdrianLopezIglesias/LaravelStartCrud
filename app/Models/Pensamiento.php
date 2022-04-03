<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Pensamiento
 * @package App\Models
 * @version March 26, 2022, 1:44 am UTC
 *
 * @property string $created_at
 * @property string $updated_at
 * @property string $texto
 * @property string $tags
 */
class Pensamiento extends Model {


    public $table = 'pensamientos';




    public $fillable = [
        'created_at',
        'updated_at',
        'texto',
        'tags'
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
    public static $rules = [];

    public function getCreatedAtAttribute($value) {
        return date('d-m-Y', strtotime($value));
    }

    public function getTagsAttribute($value) {
        return json_decode($value);
        // return $value;
    }
}
