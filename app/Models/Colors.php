<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
	protected $table = 'color';
    protected $fillable = ['color_name','status','created_at','updated_at'];
}
