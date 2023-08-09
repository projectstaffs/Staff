<?php

namespace App\Http\Resources\forms;

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

class NurseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
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
        
        //$education = FormNurseeducation::where('form_id', $this->id)->get(); 
        //$joboption = FormNursejoboption::where('form_id', $this->id)->get();
        //$typework = FormNursetypework::where('form_id', $this->id)->get();         
        //$dutie = FormNursedutie::where('form_id', $this->id)->get();        
        //$diagnose = FormDiagnose::where('form_id', $this->id)->get();
        //$skill = FormNurseskill::where('form_id', $this->id)->get();         
        //$worklocation = FormNurseworklocation::where('form_id', $this->id)->get();

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'nurse_exp' => $this->nurse_exp,
            'experience' => $this->get_experience->title,
            'recommendation' => $this->get_recommendation->title,            
            'education_about' => $this->education_about,
            'workperiod' => $this->get_workperiod->title,
            'employment' => $this->get_employment->title,            
            'hourpay' => $this->get_hourpay->title,
            'monthpay' => $this->get_monthpay->title,            
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
            
            'experience_id' => $this->experience_id,
            'recommendation_id' => $this->recommendation_id,
            'workperiod_id' => $this->workperiod_id,
            'employment_id' => $this->employment_id,            
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
