<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $table = 'demands';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];

   
}