<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Session;

/**
 * Class Position
 * @package App\Models
 * @version November 30, 2021, 4:45 pm +07
 *
 * @property string $name
 * @property integer $status
 */
class Position extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $connection;

    public function __construct()
    {
        $this->connection = Session::get('connection')['db_name'];
    }
    public $table = 'position';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
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
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
