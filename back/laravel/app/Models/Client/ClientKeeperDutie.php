<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientKeeperdutie extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'keeperdutie_id' ];
}
