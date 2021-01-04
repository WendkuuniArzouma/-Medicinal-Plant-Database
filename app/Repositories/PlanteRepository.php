<?php

namespace App\Repositories;

use App\Models\Plante;
use App\Repositories\BaseRepository;

/**
 * Class PlanteRepository
 * @package App\Repositories
 * @version April 25, 2020, 2:23 am UTC
*/

class PlanteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomScientifique',
        'espece',
        'famille',
        'nomMoore',
        'nomDioula',
        'nomFulfulde',
        'enDanger',
        'photo'
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
        return Plante::class;
    }
}
