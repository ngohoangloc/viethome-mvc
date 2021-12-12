<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $table = 'users';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $filltable = [
        'id',
        'username',
        'email',
        'password'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'user_id');
    }
}