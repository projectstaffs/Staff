<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\forms\Keeper;
use App\Models\forms\FormKeeperdutie;
use App\Http\Resources\KeeperdutieResource;
use App\Models\forms\FormKeeperjoboption;
use App\Http\Resources\KeeperjoboptionResource;
use App\Models\forms\FormKeeperpreference;
use App\Http\Resources\KeeperpreferenceResource;
use App\Models\forms\FormKeepertypework;
use App\Http\Resources\KeepertypeworkResource;

class KeeperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {         
        $joboption = FormKeeperjoboption::where('form_id', $this->id)->get();
        $typework = FormKeepertypework::where('form_id', $this->id)->get();         
        $dutie = FormKeeperdutie::where('form_id', $this->id)->get();        
        $preference = FormKeeperpreference::where('form_id', $this->id)->get();        

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'keeper_exp' => $this->keeper_exp,
            'experience' => $this->get_experience->title,
            'recommendation' => $this->get_recommendation->title,           
            'workperiod' => $this->get_workperiod->title,
            'employment' => $this->get_employment->title,            
            
            'technique' => $this->technique,
            'material' => $this->material,
            'baby_keeper' => $this->baby_keeper,
            'nurse_keeper' => $this->nurse_keeper,

            'hourpay' => $this->get_hourpay->title,
            'monthpay' => $this->get_monthpay->title,            
            'additional' => Keeper::where('user_id', $this->user_id)->value('additional'),                       
            'confirmed' => $this->confirmed,            
                        
            'Joboptions' => KeeperjoboptionResource::collection($joboption),
            'Typeworks' => KeepertypeworkResource::collection($typework),
            'Duties' => KeeperdutieResource::collection($dutie),
            'Preferences' => KeeperpreferenceResource::collection($preference),                        
            
            'experience_id' => $this->experience_id,
            'recommendation_id' => $this->recommendation_id,
            'workperiod_id' => $this->workperiod_id,
            'employment_id' => $this->employment_id,            
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
