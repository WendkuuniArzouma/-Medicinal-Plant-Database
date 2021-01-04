<?php

namespace App\Repositories;

use App\Models\ZoneRencontree;
use App\Repositories\BaseRepository;

/**
 * Class ZoneRencontreeRepository
 * @package App\Repositories
 * @version April 25, 2020, 2:29 am UTC
*/

class ZoneRencontreeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomzone',
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
        return ZoneRencontree::class;
    }
}
