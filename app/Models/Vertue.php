<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Vertue",
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
 *          property="nomVertue",
 *          description="nomVertue",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="recette",
 *          description="recette",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="utilisation",
 *          description="utilisation",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="plante_id",
 *          description="plante_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="regionPratiquee_id",
 *          description="regionPratiquee_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="partieUtilisee_id",
 *          description="partieUtilisee_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Vertue extends Model
{
    use SoftDeletes;

    public $table = 'vertues';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nomVertue',
        'recette',
        'utilisation',
        'plante_id',
        'regionPratiquee_id',
        'partieUtilisee_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomVertue' => 'string',
        'recette' => 'string',
        'utilisation' => 'string',
        'plante_id' => 'integer',
        'regionPratiquee_id' => 'integer',
        'partieUtilisee_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomVertue' => 'required',
        'recette' => 'required',
        'utilisation' => 'required',
        'plante_id' => 'required',
        'regionPratiquee_id' => 'required',
        'partieUtilisee_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function partieutilisee()
    {
        return $this->belongsTo(\App\Models\Partieutilisee::class, 'partieUtilisee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function plante()
    {
        return $this->belongsTo(\App\Models\Plante::class, 'plante_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function regionpratiquee()
    {
        return $this->belongsTo(\App\Models\Regionpratiquee::class, 'regionPratiquee_id');
    }
}
