<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\forms\Baby;
use App\Models\forms\UserLanguages;
use App\Http\Resources\UserLanguagesResource;
use App\Models\forms\FormAgegroup;
use App\Http\Resources\FormAgegroupResource;
use App\Models\forms\FormEducation;
use App\Http\Resources\FormEducationResource;
use App\Models\forms\FormTypework;
use App\Http\Resources\FormTypeworkResource;
use App\Models\forms\FormJoboption;
use App\Http\Resources\FormJoboptionResource;
use App\Models\forms\FormDutie;
use App\Http\Resources\FormDutieResource;

class BabyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $lang = UserLanguages::where('user_id', $this->user_id)->get(); 
        $agegroup = FormAgegroup::where('form_id', $this->id)->get(); 
        $education = FormEducation::where('form_id', $this->id)->get(); 
        $typework = FormTypework::where('form_id', $this->id)->get(); 
        $joboption = FormJoboption::where('form_id', $this->id)->get(); 
        $dutie = FormDutie::where('form_id', $this->id)->get(); 
          
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'baby_exp' => $this->baby_exp,
            'experience' => $this->get_experience->title,
            'recommendation' => $this->get_recommendation->title,            
            'education_about' => $this->education_about,
            'workperiod' => $this->get_workperiod->title,
            'employment' => $this->get_employment->title,
            'childrencount' => $this->get_childrencount->title,
            'children_invalid' => $this->children_invalid,
            'hourpay' => $this->get_hourpay->title,
            'monthpay' => $this->get_monthpay->title,            
            'additional' => Baby::where('user_id', $this->user_id)->value('additional'),            
            'confirmed' => $this->confirmed,

            'Languages' => UserLanguagesResource::collection($lang),
            'Agegroups' => FormAgegroupResource::collection($agegroup),
            'Educations' => FormEducationResource::collection($education),
            'Typeworks' => FormTypeworkResource::collection($typework),
            'Joboptions' => FormJoboptionResource::collection($joboption),
            'Duties' => FormDutieResource::collection($dutie),
            
            'experience_id' => $this->experience_id,
            'recommendation_id' => $this->recommendation_id,
            'workperiod_id' => $this->workperiod_id,
            'employment_id' => $this->employment_id,
            'childrencount_id' => $this->childrencount_id,
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
