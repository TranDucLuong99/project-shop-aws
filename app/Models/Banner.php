<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Banner extends Model
{
    //
    use SoftDeletes;
    protected $table = 'banners';
    const Active   = 1;
    const Inactive = 0;
}
