<?php

namespace App\Models\Models_be;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Industry
 * @package App\Models
 * @version December 1, 2021, 4:14 pm +07
 *
 * @property string $name
 * @property string $description
 */
class Industry extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'industry';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $connection = "backend";

    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:120',
        'description' => 'nullable|string|max:500',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
