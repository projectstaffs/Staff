<?php

namespace App\Http\Resources\client;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

use App\Models\client\Client_nurse;
use App\Models\client\Client_nursejoboption;
use App\Http\Resources\client\ClientNursejoboptionResource;
use App\Models\client\Client_nursedutie;
use App\Http\Resources\client\ClientNursedutieResource;

use App\Models\data\WorkPeriod;
use App\Models\data\Employment;
use App\Models\data\MonthlyPayment;
use App\Models\data\HourlyPayment;

class ClientNurseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('client_nursejoboptions')) { Cache::put('client_nursejoboptions', Client_nursejoboption::all()); }
        $Client_nursejoboption = Cache::get('client_nursejoboptions');
        $joboption = array();
        foreach ($Client_nursejoboption as $item) {
            if($item->form_id == $this->id) {
                array_push($joboption, $item);
            }                           
        }

        if(!Cache::has('client_nurseduties')) { Cache::put('client_nurseduties', Client_nursedutie::all()); }
        $Client_nursedutie = Cache::get('client_nurseduties');
        $dutie = array();
        foreach ($Client_nursedutie as $item) {
            if($item->form_id == $this->id) {
                array_push($dutie, $item);
            }                           
        }

        if(!Cache::has('workperiods')) { Cache::put('workperiods', WorkPeriod::all()); }
        $WorkPeriod = Cache::get('workperiods');
        $workPeriod = '';
        foreach ($WorkPeriod as $item) {
            if($item->id == $this->workperiod_id) {
                $workPeriod = $item->title;                
                break;
            }                           
        }

        if(!Cache::has('employments')) { Cache::put('employments', Employment::all()); }
        $Employment = Cache::get('employments');
        $employment = '';
        foreach ($Employment as $item) {
            if($item->id == $this->employment_id) {
                $employment = $item->title;                
                break;
            }                           
        }

        if(!Cache::has('hourlypayments')) { Cache::put('hourlypayments', HourlyPayment::all()); }
        $HourlyPayment = Cache::get('hourlypayments');
        $hourpay = '';
        foreach ($HourlyPayment as $item) {
            if($item->id == $this->hourpay_id) {
                $hourpay = $item->title;                
                break;
            }                           
        }

        if(!Cache::has('monthlypayments')) { Cache::put('monthlypayments', MonthlyPayment::all()); }
        $MonthlyPayment = Cache::get('monthlypayments');
        $monthpay = '';
        foreach ($MonthlyPayment as $item) {
            if($item->id == $this->monthpay_id) {
                $monthpay = $item->title;                
                break;
            }                           
        }

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'confirmed' => $this->confirmed,
            'title' => $this->title,
            'title_about' => $this->title_about,            
            'workperiod' => $workPeriod,
            'employment' => $employment,
            'drive' => $this->drive,
            'agents' => $this->agents,
            'hourpay' => $hourpay,
            'monthpay' => $monthpay,
            
            'Joboptions' => ClientNursejoboptionResource::collection($joboption),
            'Duties' => ClientNursedutieResource::collection($dutie),
            
            'workperiod_id' => $this->workperiod_id,
            'employment_id' => $this->employment_id,
            'childrencount_id' => $this->childrencount_id,
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
