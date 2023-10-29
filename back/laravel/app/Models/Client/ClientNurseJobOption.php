<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_nursejoboption extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'nursejoboption_id' ];
}
