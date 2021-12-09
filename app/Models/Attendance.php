<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Session;

/**
 * Class Attendance
 * @package App\Models
 * @version December 8, 2021, 8:34 am +07
 *
 * @property integer $employee_id
 * @property integer $status
 * @property string $reason
 * @property string|\Carbon\Carbon $date
 */
class Attendance extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'attendance';
    protected $connection;

    public function __construct()
    {
        $this->connection = Session::get('connection')['db_name'];
    }
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'employee_id',
        'status',
        'reason',
        'date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'status' => 'integer',
        'reason' => 'string',
        'date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'employee_id' => 'required|integer',
//        'status' => 'required|integer',
//        'reason' => 'nullable|string|max:500',
        'date' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
