<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    /** @use HasFactory<\Database\Factories\JobListingFactory> */
    use HasFactory;

    protected $fillable = [
        "client_id",
        "title",
        "desc",
        "budget"
    ];

    public function client()
    {
        return $this->belongsTo(User::class, "client_id");
    }
}
