<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Profile extends Model
{
    use SoftDeletes;

    protected $table = 'vh_profiles';
    
    protected $primaryKey = 'id';

    public $timestamps = true;


    protected $filltable = ['user_id',
                            'lastname',
                            'firstname',
                            'location',
                            'phone'
                        ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}