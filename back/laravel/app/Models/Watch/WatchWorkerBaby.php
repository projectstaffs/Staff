<?php

namespace App\Models\watch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchWorkerBaby extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'anketa_id'];
}
