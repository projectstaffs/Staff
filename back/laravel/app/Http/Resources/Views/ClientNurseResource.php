<?php

namespace App\Http\Resources\Views;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

use App\Models\Client\ClientNurse;
use App\Models\Client\ClientNurseDutie;
use App\Http\Resources\Client\ClientNurseDutieResource;
use App\Models\User;
use App\Http\Resources\UserResource;

use App\Models\Data\WorkPeriod;
use App\Models\Data\MonthlyPayment;
use App\Models\Data\HourlyPayment;
use Illuminate\Support\Carbon;

class ClientNurseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('users')) { Cache::put('users', User::all()); }
        $Users = Cache::get('users');
        $user = null;
        foreach ($Users as $item) {
            if($item->id == $this->user_id) {
                $user = $item;
                break;
            }                           
        }
        $USER = new UserResource($user); 
        
        if(!Cache::has('client_nurseduties')) { Cache::put('client_nurseduties', ClientNurseDutie::all()); }
        $Dutie = Cache::get('client_nurseduties');
        $dutie = array();
        foreach ($Dutie as $item) {
            if($item->form_id == $this->id) {
                array_push($dutie, $item);
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

        $Date = Carbon::parse($this->created_at)->format('d.m.Y');
        
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'confirmed' => $this->confirmed,
            'title_about' => $this->getTranslations('title_about'),            
            'workperiod' => $workPeriod,
            'hourpay' => $hourpay,
            'monthpay' => $monthpay,            
            
            'Duties' => ClientNurseDutieResource::collection($dutie),
            'User' => $USER,
            'date' => $Date,
            
            'workperiod_id' => $this->workperiod_id,
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
