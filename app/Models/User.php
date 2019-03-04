<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['first_name','last_name', 'email', 'phone_code','phone', 'password', 'user_type', 'status','created_at', 'updated_at', 'remember_token'];
}
