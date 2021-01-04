<?php

namespace App\Repositories;

use App\Models\Vertue;
use App\Repositories\BaseRepository;

/**
 * Class VertueRepository
 * @package App\Repositories
 * @version April 25, 2020, 2:30 am UTC
*/

class VertueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomVertue',
        'recette',
        'utilisation',
        'plante_id',
        'regionPratiquee_id',
        'partieUtilisee_id'
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
        return Vertue::class;
    }
}
