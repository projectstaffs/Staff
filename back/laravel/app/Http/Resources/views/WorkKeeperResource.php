<?php

namespace App\Http\Resources\views;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

use App\Models\forms\Keeper;
use App\Models\forms\FormKeeperdutie;
use App\Http\Resources\forms\KeeperdutieResource;
use App\Models\forms\FormKeeperjoboption;
use App\Http\Resources\forms\KeeperjoboptionResource;
use App\Models\forms\FormKeeperpreference;
use App\Http\Resources\forms\KeeperpreferenceResource;
use App\Models\forms\FormKeepertypework;
use App\Http\Resources\forms\KeepertypeworkResource;
use App\Models\User;
use App\Http\Resources\UserResource;

class WorkKeeperResource extends JsonResource
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

        if(!Cache::has('formkeeperjoboptions')) { Cache::put('formkeeperjoboptions', FormKeeperjoboption::all()); }
        $FormKeeperjoboption = Cache::get('formkeeperjoboptions');
        $joboption = array();
        foreach ($FormKeeperjoboption as $item) {
            if($item->form_id == $this->id) {
                array_push($joboption, $item);
            }                           
        }

        if(!Cache::has('formkeepertypeworks')) { Cache::put('formkeepertypeworks', FormKeepertypework::all()); }
        $FormKeepertypework = Cache::get('formkeepertypeworks');
        $typework = array();
        foreach ($FormKeepertypework as $item) {
            if($item->form_id == $this->id) {
                array_push($typework, $item);
            }                           
        }

        if(!Cache::has('formkeeperduties')) { Cache::put('formkeeperduties', FormKeeperdutie::all()); }
        $FormKeeperdutie = Cache::get('formkeeperduties');
        $dutie = array();
        foreach ($FormKeeperdutie as $item) {
            if($item->form_id == $this->id) {
                array_push($dutie, $item);
            }                           
        }

        if(!Cache::has('formkeeperpreferences')) { Cache::put('formkeeperpreferences', FormKeeperpreference::all()); }
        $FormKeeperpreference = Cache::get('formkeeperpreferences');
        $preference = array();
        foreach ($FormKeeperpreference as $item) {
            if($item->form_id == $this->id) {
                array_push($preference, $item);
            }                           
        }
        
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
            //'additional' => Baby::where('user_id', $this->user_id)->value('additional'),
            'additional' => $this->value('additional'),                      
            'confirmed' => $this->confirmed,            
                        
            'Joboptions' => KeeperjoboptionResource::collection($joboption),
            'Typeworks' => KeepertypeworkResource::collection($typework),
            'Duties' => KeeperdutieResource::collection($dutie),
            'Preferences' => KeeperpreferenceResource::collection($preference),
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
