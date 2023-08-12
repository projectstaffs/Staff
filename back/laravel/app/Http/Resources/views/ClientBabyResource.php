<?php
namespace App\Http\Resources\views;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

use App\Models\client\Client_baby;
use App\Models\client\Client_agegroup;
use App\Http\Resources\client\ClientAgegroupResource;
use App\Models\client\Client_joboption;
use App\Http\Resources\client\ClientJoboptionResource;
use App\Models\client\Client_dutie;
use App\Http\Resources\client\ClientDutieResource;
use App\Models\User;
use App\Http\Resources\UserResource;

use App\Models\data\Children;
use App\Models\data\WorkPeriod;
use App\Models\data\Employment;
use App\Models\data\MonthlyPayment;
use App\Models\data\HourlyPayment;

class ClientBabyResource extends JsonResource
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

        if(!Cache::has('client_agegroups')) { Cache::put('client_agegroups', Client_agegroup::all()); }
        $Agegroup = Cache::get('client_agegroups');
        $agegroup = array();
        foreach ($Agegroup as $item) {
            if($item->form_id == $this->id) {
                array_push($agegroup, $item);
            }                           
        }
        
        if(!Cache::has('client_joboptions')) { Cache::put('client_joboptions', Client_joboption::all()); }
        $Joboption = Cache::get('client_joboptions');
        $joboption = array();
        foreach ($Joboption as $item) {
            if($item->form_id == $this->id) {
                array_push($joboption, $item);
            }                           
        } 
        
        if(!Cache::has('client_duties')) { Cache::put('client_duties', Client_dutie::all()); }
        $Dutie = Cache::get('client_duties');
        $dutie = array();
        foreach ($Dutie as $item) {
            if($item->form_id == $this->id) {
                array_push($dutie, $item);
            }                           
        } 
        
        if(!Cache::has('childrens')) { Cache::put('childrens', Children::all()); }
        $Children = Cache::get('childrens');
        $children = '';
        foreach ($Children as $item) {
            if($item->id == $this->childrencount_id) {
                $children = $item->title;                
                break;
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
            
            'childrencount' => $children,
            'workperiod' => $workPeriod,
            'employment' => $employment,
            'drive' => $this->drive,
            'agents' => $this->agents,
            'hourpay' => $hourpay,
            'monthpay' => $monthpay,

            'Agegroups' => ClientAgegroupResource::collection($agegroup),            
            'Joboptions' => ClientJoboptionResource::collection($joboption),
            'Duties' => ClientDutieResource::collection($dutie),
            'User' => $USER,
            
            'workperiod_id' => $this->workperiod_id,
            'employment_id' => $this->employment_id,
            'childrencount_id' => $this->childrencount_id,
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
