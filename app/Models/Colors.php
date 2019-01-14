<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
	protected $table = 'color';
    protected $fillable = ['color_name','slug','status','created_at','updated_at'];
}
