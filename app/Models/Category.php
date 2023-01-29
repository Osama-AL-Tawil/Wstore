<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes,CascadeSoftDeletes,HasFactory;

    protected $guarded=[];
    protected $cascadeDeletes = ['store'];
    protected $dates = ['deleted_at'];

    public function store(){
     return $this->hasMany(Store::class,'category_id','id');
    }

}
