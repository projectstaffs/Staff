<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keeper extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'keeper_exp', 'experience_id', 'recommendation_id', 'workperiod_id', 'employment_id', 'technique', 'material', 'baby_keeper', 'nurse_keeper', 'hourpay_id', 'monthpay_id', 'additional', 'confirmed'];
}
