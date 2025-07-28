<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'deadline',
        
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
