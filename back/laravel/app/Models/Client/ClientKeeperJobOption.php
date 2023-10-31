<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientKeeperjoboption extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'keeperjoboption_id' ];
}
