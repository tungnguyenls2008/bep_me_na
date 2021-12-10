<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Session;

/**
 * Class RawMaterialImport
 * @package App\Models
 * @version November 23, 2021, 4:51 am UTC
 *
 * @property string $bill_code
 * @property string $name
 * @property string $proof
 * @property integer $quantity
 * @property integer $unit
 * @property integer $price
 * @property integer $total
 * @property integer $user_id
 * @property integer $provider_id
 * @property integer $status
 */
class RawMaterialImport extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'raw_material_import';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    /**
     * @var mixed
     */
    protected $connection;

    public function __construct()
    {
        $this->connection = Session::get('connection')['db_name'];
    }

    public $fillable = [
        'bill_code',
        'name',
        'proof',
        'quantity',
        'unit',
        'price',
        'total',
        'status',
        'user_id',
        'provider_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'quantity' => 'integer',
        'unit' => 'integer',
        'price' => 'integer',
        'total' => 'integer',
        'user_id' => 'integer',
        'provider_id' => 'integer',
        'status' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'quantity' => 'required|integer',
        'unit' => 'required|integer',
        'price' => 'required|integer',
        'total' => 'integer',
        'user_id' => 'integer',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
