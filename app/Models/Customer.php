<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Customer
 * @package App\Models
 * @version November 24, 2021, 3:45 pm +07
 *
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string|\Carbon\Carbon $dob
 * @property string $favorites
 * @property string $note
 */
class Customer extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'customer';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'phone',
        'address',
        'dob',
        'favorites',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'dob' => 'datetime',
        //'favorites' => 'string',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:24',
        'address' => 'nullable|string|max:255',
        'dob' => 'nullable',
        'favorites' => 'nullable|max:255',
        'note' => 'nullable|string',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
