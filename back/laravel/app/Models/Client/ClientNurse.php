<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientNurse extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'confirmed', 'title', 'title_about', 'workperiod_id', 'employment_id', 'drive', 'agents', 'hourpay_id', 'monthpay_id',];
}
