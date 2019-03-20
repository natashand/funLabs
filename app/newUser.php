<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newUser extends Model
{
    public const TABLE = 'new_users';
    
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    protected $hidden = [
        'password'
    ];
}
