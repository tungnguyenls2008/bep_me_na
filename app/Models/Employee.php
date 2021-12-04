<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Session;

/**
 * Class Employee
 * @package App\Models
 * @version November 30, 2021, 4:51 pm +07
 *
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property integer $position_id
 * @property integer $shift
 * @property integer $salary
 * @property integer $unit
 * @property integer $status
 * @property integer $grade
 */
class Employee extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $connection;

    public function __construct()
    {
        $this->connection = Session::get('connection')['db_name'];
    }
    public $table = 'employee';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'phone',
        'address',
        'position_id',
        'shift',
        'salary',
        'unit',
        'status',
        'grade'
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
        'position_id' => 'integer',
        'shift' => 'integer',
        'salary' => 'integer',
        'unit' => 'integer',
        'status' => 'integer',
        'grade' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:16',
        'address' => 'nullable|string|max:500',
        'position_id' => 'required|integer',
        'shift' => 'nullable|integer',
        'salary' => 'required|integer',
        'unit' => 'required|integer',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
