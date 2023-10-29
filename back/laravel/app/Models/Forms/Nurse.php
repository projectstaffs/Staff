<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nurse_exp', 'experience_id', 'recommendation_id', 'education_about', 'workperiod_id', 'employment_id', 'hourpay_id', 'monthpay_id', 'additional', 'confirmed'];
}
