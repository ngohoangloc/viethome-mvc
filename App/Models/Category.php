<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'vh_categories';

    protected $primaryKey = 'id';

    public $timestamps = true;


    protected $filltable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}