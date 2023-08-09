<?php

namespace App\Http\Resources\views;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

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
        
        if(!Cache::has('client_keeperjoboptions')) { Cache::put('client_keeperjoboptions', Client_keeperjoboption::all()); }
        $Joboption = Cache::get('client_keeperjoboptions');
        $joboption = array();
        foreach ($Joboption as $item) {
            if($item->form_id == $this->id) {
                array_push($joboption, $item);
            }                           
        } 
        
        if(!Cache::has('client_keeperduties')) { Cache::put('client_keeperduties', Client_keeperdutie::all()); }
        $Dutie = Cache::get('client_keeperduties');
        $dutie = array();
        foreach ($Dutie as $item) {
            if($item->form_id == $this->id) {
                array_push($dutie, $item);
            }                           
        }
        
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
            'User' => $USER,
            
            'workperiod_id' => $this->workperiod_id,
            'employment_id' => $this->employment_id,
            'childrencount_id' => $this->childrencount_id,
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
