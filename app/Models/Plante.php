<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Plante",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="nomScientifique",
 *          description="nomScientifique",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="espece",
 *          description="espece",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="famille",
 *          description="famille",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nomMoore",
 *          description="nomMoore",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nomDioula",
 *          description="nomDioula",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nomFulfulde",
 *          description="nomFulfulde",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="enDanger",
 *          description="enDanger",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="photo",
 *          description="photo",
 *          type="string"
 *      )
 * )
 */
class Plante extends Model
{
    use SoftDeletes;

    public $table = 'plantes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomScientifique' => 'string',
        'espece' => 'string',
        'famille' => 'string',
        'nomMoore' => 'string',
        'nomDioula' => 'string',
        'nomFulfulde' => 'string',
        'enDanger' => 'boolean',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomScientifique' => 'required',
        'enDanger' => 'required',
        'photo' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function zoneRencontrees()
	{
		return $this->belongsToMany('App\Models\ZoneRencontree','plante_zoneRencontree');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function vertues()
    {
        return $this->hasMany(\App\Models\Vertue::class, 'plante_id');
    }
}
