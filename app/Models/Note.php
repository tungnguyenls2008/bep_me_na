<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Note
 * @package App\Models
 * @version November 24, 2021, 2:20 pm +07
 *
 * @property string $bill_code
 * @property string $content
 */
class Note extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'note';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'bill_code',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bill_code' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bill_code' => 'required|string',
        'content' => 'required|string',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
