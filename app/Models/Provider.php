<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Session;

/**
 * Class Provider
 * @package App\Models
 * @version November 30, 2021, 11:47 am +07
 *
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $note
 * @property integer $count
 */
class Provider extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $connection;

    public function __construct()
    {
        $this->connection = Session::get('connection')['db_name'];
    }
    public $table = 'provider';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'phone',
        'address',
        'note',
        'count',
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
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:500',
        'note' => 'nullable|string',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
