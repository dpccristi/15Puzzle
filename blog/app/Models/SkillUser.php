<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SkillUser
 * @package App\Models
 * @version February 13, 2018, 11:03 am UTC
 *
 * @property integer user_id
 * @property integer skill_id
 * @property string year_of_experience
 * @property string|\Carbon\Carbon deleted_ad
 */
class SkillUser extends Model
{
    use SoftDeletes;

    public $table = 'skill_user';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'skill_id',
        'year_of_experience',
        'deleted_ad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'skill_id' => 'integer',
        'year_of_experience' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
