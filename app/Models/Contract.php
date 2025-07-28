<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
protected $fillable = ['proposal_id', 'status', 'deadline', 'payment'];

}
