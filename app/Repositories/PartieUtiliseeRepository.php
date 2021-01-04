<?php

namespace App\Repositories;

use App\Models\PartieUtilisee;
use App\Repositories\BaseRepository;

/**
 * Class PartieUtiliseeRepository
 * @package App\Repositories
 * @version April 25, 2020, 2:31 am UTC
*/

class PartieUtiliseeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomPartie'
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
        return PartieUtilisee::class;
    }
}
