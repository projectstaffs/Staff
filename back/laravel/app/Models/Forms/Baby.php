<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'baby_exp', 'experience_id', 'recommendation_id', 'education_about', 'workperiod_id', 'employment_id', 'childrencount_id', 'children_invalid', 'hourpay_id', 'monthpay_id', 'additional', 'confirmed'];
}
