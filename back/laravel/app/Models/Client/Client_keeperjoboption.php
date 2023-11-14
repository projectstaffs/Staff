<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_keeperjoboption extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'keeperjoboption_id' ];
}
