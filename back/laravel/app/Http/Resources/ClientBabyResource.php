<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\client\Client_baby;
use App\Models\client\Client_agegroup;
use App\Http\Resources\ClientAgegroupResource;
use App\Models\client\Client_joboption;
use App\Http\Resources\ClientJoboptionResource;
use App\Models\client\Client_dutie;
use App\Http\Resources\ClientDutieResource;

class ClientBabyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $agegroup = Client_agegroup::where('form_id', $this->id)->get();
        $joboption = Client_joboption::where('form_id', $this->id)->get(); 
        $dutie = Client_dutie::where('form_id', $this->id)->get();

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'confirmed' => $this->confirmed,
            'title' => $this->title,
            'title_about' => $this->title_about,
            'childrencount' => $this->get_childrencount->title,
            'workperiod' => $this->get_workperiod->title,
            'employment' => $this->get_employment->title,
            'drive' => $this->drive,
            'agents' => $this->agents,
            'hourpay' => $this->get_hourpay->title,
            'monthpay' => $this->get_monthpay->title,

            'Agegroups' => ClientAgegroupResource::collection($agegroup),            
            'Joboptions' => ClientJoboptionResource::collection($joboption),
            'Duties' => ClientDutieResource::collection($dutie),
            
            'workperiod_id' => $this->workperiod_id,
            'employment_id' => $this->employment_id,
            'childrencount_id' => $this->childrencount_id,
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
