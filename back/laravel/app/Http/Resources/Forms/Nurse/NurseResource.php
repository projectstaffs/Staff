<?php

namespace App\Http\Resources\Forms\Nurse;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

use App\Models\Forms\Nurse;
use App\Models\Forms\FormNurseEducation;
use App\Http\Resources\Forms\Nurse\FormNurseEducationResource;
use App\Models\Forms\FormNurseJobOption;
use App\Http\Resources\Forms\Nurse\FormNurseJobOptionResource;
use App\Models\Forms\FormDiagnose;
use App\Http\Resources\Forms\Nurse\FormDiagnoseResource;
use App\Models\Forms\FormNurseDutie;
use App\Http\Resources\Forms\Nurse\FormNurseDutieResource;
use App\Models\Forms\FormNurseSkill;
use App\Http\Resources\Forms\Nurse\FormNurseSkillResource;
use App\Models\Forms\FormNurseTypeWork;
use App\Http\Resources\Forms\Nurse\FormNurseTypeWorkResource;
use App\Models\Forms\FormNurseWorkLocation;
use App\Http\Resources\Forms\Nurse\FormNurseWorkLocationkResource;

use App\Models\Data\WorkPeriod;
use App\Models\Data\Employment;
use App\Models\Data\MonthlyPayment;
use App\Models\Data\HourlyPayment;
use App\Models\Data\Recommendation;
use App\Models\Data\Experience;

class NurseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('nurses')) { Cache::put('nurses', Nurse::all()); }
        $Nurse = Cache::get('nurses');
        $additional = '';
        foreach ($Nurse as $item) {
            if($item->user_id == $this->user_id) {
                $additional = $item->additional;
            }                           
        }

        if(!Cache::has('formnurseeducations')) { Cache::put('formnurseeducations', FormNurseEducation::all()); }
        $FormNurseeducation = Cache::get('formnurseeducations');
        $education = array();
        foreach ($FormNurseeducation as $item) {
            if($item->form_id == $this->id) {
                array_push($education, $item);
            }                           
        }

        if(!Cache::has('formnursejoboptions')) { Cache::put('formnursejoboptions', FormNurseJobOption::all()); }
        $FormNursejoboption = Cache::get('formnursejoboptions');
        $joboption = array();
        foreach ($FormNursejoboption as $item) {
            if($item->form_id == $this->id) {
                array_push($joboption, $item);
            }                           
        }

        if(!Cache::has('formnursetypeworks')) { Cache::put('formnursetypeworks', FormNurseTypeWork::all()); }
        $FormNurseeducation = Cache::get('formnursetypeworks');
        $typework = array();
        foreach ($FormNurseeducation as $item) {
            if($item->form_id == $this->id) {
                array_push($typework, $item);
            }                           
        }

        if(!Cache::has('formnurseduties')) { Cache::put('formnurseduties', FormNurseDutie::all()); }
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

        if(!Cache::has('formnurseskills')) { Cache::put('formnurseskills', FormNurseSkill::all()); }
        $FormNurseskill = Cache::get('formnurseskills');
        $skill = array();
        foreach ($FormNurseskill as $item) {
            if($item->form_id == $this->id) {
                array_push($skill, $item);
            }                           
        }

        if(!Cache::has('formnurseworklocations')) { Cache::put('formnurseworklocations', FormNurseWorkLocation::all()); }
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
            'nurse_exp' => $this->nurse_exp,
            'experience' => $experience,
            'recommendation' => $recommendation,            
            'education_about' => $this->education_about,
            'workperiod' => $workPeriod,
            'employment' => $employment,            
            'hourpay' => $hourpay,
            'monthpay' => $monthpay,           
            //'additional' => Baby::where('user_id', $this->user_id)->value('additional'),
            'additional' => $additional,                       
            'confirmed' => $this->confirmed,
            
            'Educations' => FormNurseEducationResource::collection($education),            
            'Joboptions' => FormNurseJobOptionResource::collection($joboption),
            'Typeworks' => FormNurseTypeWorkResource::collection($typework),
            'Duties' => FormNurseDutieResource::collection($dutie),
            'Diagnoses' => FormDiagnoseResource::collection($diagnose),
            'Skills' => FormNurseSkillResource::collection($skill),
            'Worklocations' => FormNurseWorkLocationkResource::collection($worklocation),            
            
            'experience_id' => $this->experience_id,
            'recommendation_id' => $this->recommendation_id,
            'workperiod_id' => $this->workperiod_id,
            'employment_id' => $this->employment_id,            
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
