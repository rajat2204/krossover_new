<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Childcategories extends Model
{
	protected $table = 'childcategories';
    protected $fillable = ['cid','sid','name','slug','status','created_at','updated_at'];
}
