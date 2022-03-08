<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    //
    use SoftDeletes;
    protected $table = 'products';
    const Active   = 1;
    const Inactive = 0;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'avatar',
        'price',
        'new_price',
        'new_price',
        'discount',
        'amount',
        'summary',
        'content',
        'is_active',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function order(){
        return $this->belongsToMany(Order::class, 'order_details', 'product_id', 'order_id');
    }
}
