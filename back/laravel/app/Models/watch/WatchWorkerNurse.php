<?php

namespace App\Models\watch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchWorkerNurse extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'anketa_id'];
}
