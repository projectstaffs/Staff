<?php

namespace App\Http\Resources\views;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

use App\Models\forms\Nurse;
use App\Models\forms\FormNurseeducation;
use App\Http\Resources\forms\FormNurseeducationResource;
use App\Models\forms\FormNursejoboption;
use App\Http\Resources\forms\FormNursejoboptionResource;
use App\Models\forms\FormDiagnose;
use App\Http\Resources\forms\FormDiagnoseResource;
use App\Models\forms\FormNursedutie;
use App\Http\Resources\forms\FormNursedutieResource;
use App\Models\forms\FormNurseskill;
use App\Http\Resources\forms\FormNurseskillResource;
use App\Models\forms\FormNursetypework;
use App\Http\Resources\forms\FormNursetypeworkResource;
use App\Models\forms\FormNurseworklocation;
use App\Http\Resources\forms\FormNurseworklocationkResource;
use App\Models\User;
use App\Http\Resources\UserResource;

use App\Models\data\WorkPeriod;
use App\Models\data\Employment;
use App\Models\data\MonthlyPayment;
use App\Models\data\HourlyPayment;
use App\Models\data\Recommendation;
use App\Models\data\Experience;

class WorkNurseResource extends JsonResource
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

        if(!Cache::has('formnurseeducations')) { Cache::put('formnurseeducations', FormNurseeducation::all()); }
        $FormNurseeducation = Cache::get('formnurseeducations');
        $education = array();
        foreach ($FormNurseeducation as $item) {
            if($item->form_id == $this->id) {
                array_push($education, $item);
            }                           
        }

        if(!Cache::has('formnursejoboptions')) { Cache::put('formnursejoboptions', FormNursejoboption::all()); }
        $FormNursejoboption = Cache::get('formnursejoboptions');
        $joboption = array();
        foreach ($FormNursejoboption as $item) {
            if($item->form_id == $this->id) {
                array_push($joboption, $item);
            }                           
        }

        if(!Cache::has('formnursetypeworks')) { Cache::put('formnursetypeworks', FormNursetypework::all()); }
        $FormNurseeducation = Cache::get('formnursetypeworks');
        $typework = array();
        foreach ($FormNurseeducation as $item) {
            if($item->form_id == $this->id) {
                array_push($typework, $item);
            }                           
        }

        if(!Cache::has('formnurseduties')) { Cache::put('formnurseduties', FormNursedutie::all()); }
        $FormNursedutie = Cache::get('formnurseduties');
        $dutie = array();
        foreach ($FormNursedutie as $item) {
            if($item->form_id == $this->id) {
                array_push($dutie, $item);
            }                           
        }

        if(!Cache::has('formdiagnoses')) { Cache::put('formdiagnoses', FormDiagnose::all()); }
        $FormDiagnose = Cache::get('formdiagnoses');
        $diagnose = array();
        foreach ($FormDiagnose as $item) {
            if($item->form_id == $this->id) {
                array_push($diagnose, $item);
            }                           
        }

        if(!Cache::has('formnurseskills')) { Cache::put('formnurseskills', FormNurseskill::all()); }
        $FormNurseskill = Cache::get('formnurseskills');
        $skill = array();
        foreach ($FormNurseskill as $item) {
            if($item->form_id == $this->id) {
                array_push($skill, $item);
            }                           
        }

        if(!Cache::has('formnurseworklocations')) { Cache::put('formnurseworklocations', FormNurseworklocation::all()); }
        $FormNurseworklocation = Cache::get('formnurseworklocations');
        $worklocation = array();
        foreach ($FormNurseworklocation as $item) {
            if($item->form_id == $this->id) {
                array_push($worklocation, $item);
            }                           
        }

        if(!Cache::has('workperiods')) { Cache::put('workperiods', WorkPeriod::all()); }
        $WorkPeriod = Cache::get('workperiods');
        $workPeriod = '';
        foreach ($WorkPeriod as $item) {
            if($item->id == $this->workPeriod_id) {
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
            'nurse_exp' => $this->nurse_exp,
            'experience' => $experience,
            'recommendation' => $recommendation,            
            'education_about' => $this->education_about,
            'workperiod' => $workPeriod,
            'employment' => $employment,            
            'hourpay' => $hourpay,
            'monthpay' => $monthpay,            
            //'additional' => Baby::where('user_id', $this->user_id)->value('additional'),
            'additional' => $this->value('additional'),                       
            'confirmed' => $this->confirmed,
            
            'Educations' => FormNurseeducationResource::collection($education),            
            'Joboptions' => FormNursejoboptionResource::collection($joboption),
            'Typeworks' => FormNursetypeworkResource::collection($typework),
            'Duties' => FormNursedutieResource::collection($dutie),
            'Diagnoses' => FormDiagnoseResource::collection($diagnose),
            'Skills' => FormNurseskillResource::collection($skill),
            'Worklocations' => FormNurseworklocationkResource::collection($worklocation),
            'User' => $USER,            
            
            'experience_id' => $this->experience_id,
            'recommendation_id' => $this->recommendation_id,
            'workperiod_id' => $this->workperiod_id,
            'employment_id' => $this->employment_id,            
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
