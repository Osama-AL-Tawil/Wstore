<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes,HasFactory;

    protected $guarded=[];
    protected $attributes=[
        'rating'=>0,
        'rating_count'=>0,
        'rating_sum'=>0
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

}
