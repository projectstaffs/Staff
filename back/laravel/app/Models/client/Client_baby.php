<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\data\Children;
use App\Models\data\Workperiod;
use App\Models\data\Employment;
use App\Models\data\HourlyPayment;
use App\Models\data\MonthlyPayment;

class Client_baby extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'confirmed', 'title', 'title_about', 'childrencount_id', 'workperiod_id', 'employment_id', 'drive', 'agents', 'hourpay_id', 'monthpay_id',];

    public function get_childrencount() {
        return $this->belongsTo(Children::class, 'childrencount_id', 'id');
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
