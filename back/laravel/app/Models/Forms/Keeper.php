<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Keeper extends Model
{
    use HasFactory; use HasTranslations;
    protected $fillable = ['user_id', 'keeper_exp', 'experience_id', 'workperiod_id', 'hourpay_id', 'monthpay_id', 'confirmed'];
    public $translatable = [ 'keeper_exp' ];
}
