<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'vh_products';

    protected $primaryKey = 'id';

    public $timestamps = true;


    protected $filltable = [
        'category_id',
        'name',
        'price',
        'description',
        'thumbnail'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
