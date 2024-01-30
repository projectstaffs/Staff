<?php

namespace App\Http\Resources\Forms\Baby;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

use App\Models\Forms\Baby;
use App\Models\Forms\UserLanguages;
use App\Http\Resources\Forms\Baby\UserLanguagesResource;
use App\Models\Forms\FormAgeGroup;
use App\Http\Resources\Forms\Baby\FormAgeGroupResource;
use App\Models\Forms\FormEducation;
use App\Http\Resources\Forms\Baby\FormEducationResource;
use App\Models\Forms\FormTypeWork;
use App\Http\Resources\Forms\Baby\FormTypeWorkResource;
use App\Models\Forms\FormDutie;
use App\Http\Resources\Forms\Baby\FormDutieResource;

use App\Models\Data\Children;
use App\Models\Data\WorkPeriod;
use App\Models\Data\MonthlyPayment;
use App\Models\Data\HourlyPayment;
use App\Models\Data\Experience;

class BabyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('userlanguages')) { Cache::put('userlanguages', UserLanguages::all()); }
        $Userlanguages = Cache::get('userlanguages');
        $lang = array();
        foreach ($Userlanguages as $item) {
            if($item->user_id == $this->user_id) {
                array_push($lang, $item);
            }                           
        }

        if(!Cache::has('formagegroups')) { Cache::put('formagegroups', FormAgeGroup::all()); }
        $FormAgegroup = Cache::get('formagegroups');
        $agegroup = array();
        foreach ($FormAgegroup as $item) {
            if($item->form_id == $this->id) {
                array_push($agegroup, $item);
            }                           
        }

        if(!Cache::has('formeducations')) { Cache::put('formeducations', FormEducation::all()); }
        $FormEducation = Cache::get('formeducations');
        $education = array();
        foreach ($FormEducation as $item) {
            if($item->form_id == $this->id) {
                array_push($education, $item);
            }                           
        }

        if(!Cache::has('formtypeworks')) { Cache::put('formtypeworks', FormTypeWork::all()); }
        $FormTypework = Cache::get('formtypeworks');
        $typework = array();
        foreach ($FormTypework as $item) {
            if($item->form_id == $this->id) {
                array_push($typework, $item);
            }                           
        }

        if(!Cache::has('formduties')) { Cache::put('formduties', FormDutie::all()); }
        $FormDutie = Cache::get('formduties');
        $dutie = array();
        foreach ($FormDutie as $item) {
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

        if(!Cache::has('experiences')) { Cache::put('experiences', Experience::all()); }
        $Experience = Cache::get('experiences');
        $experience = '';
        foreach ($Experience as $item) {
            if($item->id == $this->experience_id) {
                $experience = $item;                
                break;
            }                           
        }
        
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'baby_exp' => $this->getTranslations('baby_exp'),
            'experience' => $experience,
            'workperiod' => $workPeriod,
            'childrencount' => $children,
            'children_invalid' => $this->getTranslations('children_invalid'),
            'hourpay' => $hourpay,
            'monthpay' => $monthpay,        
            'confirmed' => $this->confirmed,

            'Languages' => UserLanguagesResource::collection($lang),
            'Agegroups' => FormAgeGroupResource::collection($agegroup),
            'Educations' => FormEducationResource::collection($education),
            'Typeworks' => FormTypeWorkResource::collection($typework),
            'Duties' => FormDutieResource::collection($dutie),
            
            'experience_id' => $this->experience_id,
            'workperiod_id' => $this->workperiod_id,
            'childrencount_id' => $this->childrencount_id,
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
