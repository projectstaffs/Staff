<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_agegroup extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'agegroup_id' ];
}
