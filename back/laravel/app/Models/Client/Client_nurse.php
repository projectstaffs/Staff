<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\data\Workperiod;
use App\Models\data\Employment;
use App\Models\data\HourlyPayment;
use App\Models\data\MonthlyPayment;

class Client_nurse extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'confirmed', 'title', 'title_about', 'workperiod_id', 'employment_id', 'drive', 'agents', 'hourpay_id', 'monthpay_id',];
}
