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

    public function get_experience() {
        return $this->belongsTo(Experience::class, 'experience_id', 'id');
    }
    public function get_recommendation() {
        return $this->belongsTo(Recommendation::class, 'recommendation_id', 'id');
    }
    public function get_workperiod() {
        return $this->belongsTo(Workperiod::class, 'workperiod_id', 'id');
    }
    public function get_employment() {
        return $this->belongsTo(Employment::class, 'employment_id', 'id');
    }    
    public function get_hourpay() {
        return $this->belongsTo(HourlyPayment::class, 'hourpay_id', 'id');
    }
    public function get_monthpay() {
        return $this->belongsTo(MonthlyPayment::class, 'monthpay_id', 'id');
    }
}
