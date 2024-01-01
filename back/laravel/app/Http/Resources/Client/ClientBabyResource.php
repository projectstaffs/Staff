<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

use App\Models\Client\ClientAgeGroup;
use App\Http\Resources\Client\ClientAgeGroupResource;
use App\Models\Client\ClientDutie;
use App\Http\Resources\Client\ClientDutieResource;

use App\Models\Data\Children;
use App\Models\Data\WorkPeriod;
use App\Models\Data\MonthlyPayment;
use App\Models\Data\HourlyPayment;

class ClientBabyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('client_agegroups')) { Cache::put('client_agegroups', ClientAgeGroup::all()); }
        $Client_agegroup = Cache::get('client_agegroups');
        $agegroup = array();
        foreach ($Client_agegroup as $item) {
            if($item->form_id == $this->id) {
                array_push($agegroup, $item);
            }                           
        }

        if(!Cache::has('client_duties')) { Cache::put('client_duties', ClientDutie::all()); }
        $Client_dutie = Cache::get('client_duties');
        $dutie = array();
        foreach ($Client_dutie as $item) {
            if($item->form_id == $this->id) {
                array_push($dutie, $item);
            }                           
        }

        if(!Cache::has('childrens')) { Cache::put('childrens', Children::all()); }
        $Children = Cache::get('childrens');
        $children = '';
        foreach ($Children as $item) {
            if($item->id == $this->childrencount_id) {
                $children = $item;                
                break;
            }                           
        }

        if(!Cache::has('workperiods')) { Cache::put('workperiods', WorkPeriod::all()); }
        $WorkPeriod = Cache::get('workperiods');
        $workPeriod = '';
        foreach ($WorkPeriod as $item) {
            if($item->id == $this->workperiod_id) {
                $workPeriod = $item;                
                break;
            }                           
        }

        if(!Cache::has('hourlypayments')) { Cache::put('hourlypayments', HourlyPayment::all()); }
        $HourlyPayment = Cache::get('hourlypayments');
        $hourpay = '';
        foreach ($HourlyPayment as $item) {
            if($item->id == $this->hourpay_id) {
                $hourpay = $item;                
                break;
            }                           
        }

        if(!Cache::has('monthlypayments')) { Cache::put('monthlypayments', MonthlyPayment::all()); }
        $MonthlyPayment = Cache::get('monthlypayments');
        $monthpay = '';
        foreach ($MonthlyPayment as $item) {
            if($item->id == $this->monthpay_id) {
                $monthpay = $item;                
                break;
            }                           
        }

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'confirmed' => $this->confirmed,
            'title_about' => $this->getTranslations('title_about'),
            'workperiod' => $workPeriod,
            'childrencount' => $children,
            'hourpay' => $hourpay,
            'monthpay' => $monthpay,

            'Agegroups' => ClientAgeGroupResource::collection($agegroup),            
            'Duties' => ClientDutieResource::collection($dutie),
            
            'workperiod_id' => $this->workperiod_id,            
            'childrencount_id' => $this->childrencount_id,
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
