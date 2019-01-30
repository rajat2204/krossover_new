<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    protected $table = "visitor";
    protected $fillable = ['visitor_count', 'ip_address', 'status', 'created_at','updated_at'];
}
