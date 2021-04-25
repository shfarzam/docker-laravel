<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'customer_id',
        'order_id',
        'user_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'user_id'
    ];


}
