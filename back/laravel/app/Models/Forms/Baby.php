<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Baby extends Model
{
    use HasFactory; use HasTranslations;

    protected $fillable = ['user_id', 'baby_exp', 'experience_id', 'workperiod_id', 'childrencount_id', 'children_invalid', 'hourpay_id', 'monthpay_id', 'confirmed'];
    public $translatable = [ 'baby_exp', 'children_invalid' ];
}
