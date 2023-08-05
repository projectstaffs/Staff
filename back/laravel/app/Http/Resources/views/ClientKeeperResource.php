<?php

namespace App\Http\Resources\views;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\client\Client_keeper;
use App\Models\client\Client_keeperjoboption;
use App\Http\Resources\client\ClientKeeperjoboptionResource;
use App\Models\client\Client_keeperdutie;
use App\Http\Resources\client\ClientKeeperdutieResource;
use App\Models\User;
use App\Http\Resources\UserResource;

class ClientKeeperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = new UserResource(User::where('id', $this->user_id)->first());
        $joboption = Client_keeperjoboption::where('form_id', $this->id)->get(); 
        $dutie = Client_keeperdutie::where('form_id', $this->id)->get();

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'confirmed' => $this->confirmed,
            'title' => $this->title,
            'title_about' => $this->title_about,            
            'workperiod' => $this->get_workperiod->title,
            'employment' => $this->get_employment->title,
            'drive' => $this->drive,
            'agents' => $this->agents,
            'hourpay' => $this->get_hourpay->title,
            'monthpay' => $this->get_monthpay->title,
            
            'Joboptions' => ClientKeeperjoboptionResource::collection($joboption),
            'Duties' => ClientKeeperdutieResource::collection($dutie),
            'User' => $user,
            
            'workperiod_id' => $this->workperiod_id,
            'employment_id' => $this->employment_id,
            'childrencount_id' => $this->childrencount_id,
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
