<?php

namespace App\Repositories;

use App\Models\SkillUser;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SkillUserRepository
 * @package App\Repositories
 * @version February 13, 2018, 11:03 am UTC
 *
 * @method SkillUser findWithoutFail($id, $columns = ['*'])
 * @method SkillUser find($id, $columns = ['*'])
 * @method SkillUser first($columns = ['*'])
*/
class SkillUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'skill_id',
        'year_of_experience',
        'deleted_ad'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SkillUser::class;
    }
}
