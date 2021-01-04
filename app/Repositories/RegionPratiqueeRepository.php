<?php

namespace App\Repositories;

use App\Models\RegionPratiquee;
use App\Repositories\BaseRepository;

/**
 * Class RegionPratiqueeRepository
 * @package App\Repositories
 * @version April 25, 2020, 2:28 am UTC
*/

class RegionPratiqueeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomRegion',
        'latitude',
        'longitude'
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
        return RegionPratiquee::class;
    }
}
