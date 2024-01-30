<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClientKeeper extends Model
{
    use HasFactory; use HasTranslations;

    protected $fillable = ['user_id', 'confirmed', 'title_about', 'workperiod_id', 'hourpay_id', 'monthpay_id',];
    public $translatable = [ 'title_about' ];
}
