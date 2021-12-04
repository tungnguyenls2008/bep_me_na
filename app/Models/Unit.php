<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Session;

/**
 * Class Unit
 * @package App\Models
 * @version December 1, 2021, 8:13 am +07
 *
 * @property string $name
 */
class Unit extends Model
{
    use SoftDeletes;

    use HasFactory;

    /**
     * @var mixed
     */
    protected $connection;

    public function __construct()
    {
        $this->connection = Session::get('connection')['db_name'];
    }
    public $table = 'unit';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:24',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
