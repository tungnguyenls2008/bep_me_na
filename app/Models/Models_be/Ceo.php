<?php

namespace App\Models\Models_be;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Models_be\Ceo
 * @package App\Models
 * @version December 1, 2021, 4:07 pm +07
 *
 * @property string $name
 * @property string|\Carbon\Carbon $dob
 * @property string $phone
 * @property string $address
 * @property integer $organization_id
 * @property integer $status
 */
class Ceo extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ceo';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "backend";

    public $fillable = [
        'name',
        'dob',
        'phone',
        'address',
        'organization_id',
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
        'dob' => 'datetime',
        'phone' => 'string',
        'address' => 'string',
        'organization_id' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'dob' => 'nullable',
        'phone' => 'required|string|max:16',
        'address' => 'nullable|string|max:255',
        'organization_id' => 'required|integer',
        'status' => 'required|integer',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
