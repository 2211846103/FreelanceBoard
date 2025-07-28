<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class proposal extends Model
{
   protected $fillable = [
        'name',
        'description',
        'budget',
        'deadline',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
