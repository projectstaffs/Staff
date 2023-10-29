<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientJoboption extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'joboption_id' ];
}
