<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Profile
 * @package App\Models
 * @version December 1, 2021, 4:23 pm +07
 *
 * @property string $name
 * @property integer $ceo_id
 * @property string $product_ids
 * @property integer $industry_id
 * @property string $tax_number
 * @property string $address
 * @property string|\Carbon\Carbon $dob
 * @property string $phone
 */
class Profile extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'profile';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "backend";

    public $fillable = [
        'name',
        'ceo_id',
        'product_ids',
        'industry_id',
        'tax_number',
        'address',
        'dob',
        'phone'
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
        //'product_ids' => 'string',
        'industry_id' => 'integer',
        'tax_number' => 'string',
        'address' => 'string',
        'dob' => 'datetime',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'ceo_id' => 'nullable|integer',
        //'product_ids' => 'nullable|string|max:500',
        'industry_id' => 'nullable|integer',
        'tax_number' => 'nullable|string|max:24',
        'address' => 'nullable|string|max:500',
        'dob' => 'nullable',
        'phone' => 'nullable|string|max:16',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
