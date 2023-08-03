<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\forms\Nurse;
use App\Models\forms\FormNurseeducation;
use App\Http\Resources\FormNurseeducationResource;
use App\Models\forms\FormNursejoboption;
use App\Http\Resources\FormNursejoboptionResource;
use App\Models\forms\FormDiagnose;
use App\Http\Resources\FormDiagnoseResource;
use App\Models\forms\FormNursedutie;
use App\Http\Resources\FormNursedutieResource;
use App\Models\forms\FormNurseskill;
use App\Http\Resources\FormNurseskillResource;
use App\Models\forms\FormNursetypework;
use App\Http\Resources\FormNursetypeworkResource;
use App\Models\forms\FormNurseworklocation;
use App\Http\Resources\FormNurseworklocationkResource;

class NurseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $education = FormNurseeducation::where('form_id', $this->id)->get(); 
        $joboption = FormNursejoboption::where('form_id', $this->id)->get();
        $typework = FormNursetypework::where('form_id', $this->id)->get();         
        $dutie = FormNursedutie::where('form_id', $this->id)->get();        
        $diagnose = FormDiagnose::where('form_id', $this->id)->get();
        $skill = FormNurseskill::where('form_id', $this->id)->get();         
        $worklocation = FormNurseworklocation::where('form_id', $this->id)->get();

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
            'additional' => Nurse::where('user_id', $this->user_id)->value('additional'),                       
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
