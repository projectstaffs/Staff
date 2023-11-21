<?php

namespace App\Http\Resources\Forms\Keeper;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

use App\Models\Forms\Keeper;
use App\Models\Forms\FormKeeperDutie;
use App\Http\Resources\Forms\Keeper\KeeperDutieResource;
use App\Models\Forms\FormKeeperJobOption;
use App\Http\Resources\Forms\Keeper\KeeperJobOptionResource;
use App\Models\Forms\FormKeeperPreference;
use App\Http\Resources\Forms\Keeper\KeeperPreferenceResource;
use App\Models\Forms\FormKeeperTypeWork;
use App\Http\Resources\Forms\Keeper\KeeperTypeWorkResource;

use App\Models\Data\WorkPeriod;
use App\Models\Data\Employment;
use App\Models\Data\MonthlyPayment;
use App\Models\Data\HourlyPayment;
use App\Models\Data\Recommendation;
use App\Models\Data\Experience;

class KeeperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('keepers')) { Cache::put('keepers', Keeper::all()); }
        $Keeper = Cache::get('keepers');
        $additional = '';
        foreach ($Keeper as $item) {
            if($item->user_id == $this->user_id) {
                $additional = $item->additional;
            }                           
        }

        if(!Cache::has('formkeeperjoboptions')) { Cache::put('formkeeperjoboptions', FormKeeperJobOption::all()); }
        $FormKeeperjoboption = Cache::get('formkeeperjoboptions');
        $joboption = array();
        foreach ($FormKeeperjoboption as $item) {
            if($item->form_id == $this->id) {
                array_push($joboption, $item);
            }                           
        }

        if(!Cache::has('formkeepertypeworks')) { Cache::put('formkeepertypeworks', FormKeeperTypeWork::all()); }
        $FormKeepertypework = Cache::get('formkeepertypeworks');
        $typework = array();
        foreach ($FormKeepertypework as $item) {
            if($item->form_id == $this->id) {
                array_push($typework, $item);
            }                           
        }

        if(!Cache::has('formkeeperduties')) { Cache::put('formkeeperduties', FormKeeperDutie::all()); }
        $FormKeeperdutie = Cache::get('formkeeperduties');
        $dutie = array();
        foreach ($FormKeeperdutie as $item) {
            if($item->form_id == $this->id) {
                array_push($dutie, $item);
            }                           
        }

        if(!Cache::has('formkeeperpreferences')) { Cache::put('formkeeperpreferences', FormKeeperPreference::all()); }
        $FormKeeperpreference = Cache::get('formkeeperpreferences');
        $preference = array();
        foreach ($FormKeeperpreference as $item) {
            if($item->form_id == $this->id) {
                array_push($preference, $item);
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

        if(!Cache::has('recommendations')) { Cache::put('recommendations', Recommendation::all()); }
        $Recommendation = Cache::get('recommendations');
        $recommendation = '';
        foreach ($Recommendation as $item) {
            if($item->id == $this->recommendation_id) {
                $recommendation = $item->title;                
                break;
            }                           
        }

        if(!Cache::has('experiences')) { Cache::put('experiences', Experience::all()); }
        $Experience = Cache::get('experiences');
        $experience = '';
        foreach ($Experience as $item) {
            if($item->id == $this->experience_id) {
                $experience = $item->title;                
                break;
            }                           
        }        

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'keeper_exp' => $this->keeper_exp,
            'experience' => $experience,
            'recommendation' => $recommendation,           
            'workperiod' => $workPeriod,
            'employment' => $employment,            
            
            'technique' => $this->technique,
            'material' => $this->material,
            'baby_keeper' => $this->baby_keeper,
            'nurse_keeper' => $this->nurse_keeper,

            'hourpay' => $hourpay,
            'monthpay' => $monthpay,            
            //'additional' => Keeper::where('user_id', $this->user_id)->value('additional'),
            'additional' => $additional,                      
            'confirmed' => $this->confirmed,            
                        
            'Joboptions' => KeeperJobOptionResource::collection($joboption),
            'Typeworks' => KeeperTypeWorkResource::collection($typework),
            'Duties' => KeeperDutieResource::collection($dutie),
            'Preferences' => KeeperPreferenceResource::collection($preference),                        
            
            'experience_id' => $this->experience_id,
            'recommendation_id' => $this->recommendation_id,
            'workperiod_id' => $this->workperiod_id,
            'employment_id' => $this->employment_id,            
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
