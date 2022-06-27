<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bucket extends Model
{
    //
    use SoftDeletes;
    protected $table = 'buckets';
}
