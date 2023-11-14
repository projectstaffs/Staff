<?php

namespace App\Models\forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\data\Experience;
use App\Models\data\Recommendation;
use App\Models\data\Workperiod;
use App\Models\data\Employment;
use App\Models\data\HourlyPayment;
use App\Models\data\MonthlyPayment;

class Nurse extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nurse_exp', 'experience_id', 'recommendation_id', 'education_about', 'workperiod_id', 'employment_id', 'hourpay_id', 'monthpay_id', 'additional', 'confirmed'];
}
