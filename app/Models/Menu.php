<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Session;

/**
 * Class Menu
 * @package App\Models
 * @version November 23, 2021, 4:45 am UTC
 *
 * @property string $name
 * @property integer $price
 */
class Menu extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $connection;

    public function __construct()
    {
        $this->connection = Session::get('connection')['db_name'];

    }
    public $table = 'menu';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'price',
        'count',
        'status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'price' => 'integer',
        'count' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|integer',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
