<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    //
    use SoftDeletes;
    protected $table = 'categories';
    const Active=1;
    const Inactive=0;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'title', 'avatar', 'description','status'
    ];
}
