<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_nursedutie extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'nursedutie_id' ];
}
