<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientNursedutie extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'nursedutie_id' ];
}
