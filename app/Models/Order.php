<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'orders';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'fullname',
        'address',
        'phone',
        'email',
        'note',
        'discount',
        'price_total',
        'payment_status',
    ];

    public function product(){
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id')->withPivot('order_id', 'order_id', 'quantity');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
