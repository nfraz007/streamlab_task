<?php

namespace App\Models;

use App\Models\Model;


class UserModel extends Model
{
    protected $table = 'users';
    protected $fillable = ['email', 'name', 'password', 'token'];
    
}
