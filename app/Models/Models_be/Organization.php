<?php

namespace App\Models\Models_be;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Organization
 * @package App\Models
 * @version December 1, 2021, 10:07 am +07
 *
 * @property string $name
 * @property integer $ceo_id
 * @property string $licence
 * @property string $db_name
 * @property integer $status
 */
class Organization extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'organization';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "backend";

    public $fillable = [
        'name',
        'profile_id',
        'ceo_id',
        'licence',
        'db_name',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'ceo_id' => 'integer',
        'licence' => 'string',
        'db_name' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'ceo_id' => 'required|integer',
        'licence' => 'required|string|max:24',
        'db_name' => 'required|string|max:24',
        'status' => 'required|integer',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
