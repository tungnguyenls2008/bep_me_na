<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CheckoutOrder
 * @package App\Models
 * @version November 23, 2021, 6:59 am UTC
 *
 * @property string $bill_code
 * @property string $customer_info
 * @property integer $regular_customer_id
 * @property integer $menu_id
 * @property integer $quantity
 * @property integer $price
 * @property integer $type
 * @property integer $user_id
 * @property integer $status
 */
class CheckoutOrder extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'checkout_order';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'bill_code',
        'customer_info',
        'regular_customer_id',
        'menu_id',
        'quantity',
        'price',
        'type',
        'user_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bill_code' => 'string',
        'customer_info' => 'string',
        'regular_customer_id' => 'integer',
        'menu_id' => 'string',
        'quantity' => 'string',
        'price' => 'string',
        'type' => 'string',
        'user_id' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bill_code' => 'string|max:12',
        'menu_id' => 'required',
        'quantity' => 'required',
        'price' => 'required',
        //'type' => 'required',
        'user_id' => 'integer',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
