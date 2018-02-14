<?php

namespace App\Repositories;

use App\Models\Skill;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SkillRepository
 * @package App\Repositories
 * @version February 13, 2018, 10:51 am UTC
 *
 * @method Skill findWithoutFail($id, $columns = ['*'])
 * @method Skill find($id, $columns = ['*'])
 * @method Skill first($columns = ['*'])
*/
class SkillRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Skill::class;
    }
}
