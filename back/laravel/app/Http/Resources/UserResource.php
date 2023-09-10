<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\user\Image;
use App\Models\data\City;
use App\Models\data\Country;
use App\Models\data\Criminal;
use App\Models\data\Moving;
use App\Models\data\Smoking;
use App\Models\data\Status;
use App\Models\data\Religion;
use App\Models\data\Alcohol;
use Carbon\Carbon;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('countries')) { Cache::put('countries', Country::all()); }
        $Country = Cache::get('countries');
        $country = '';
        foreach ($Country as $item) {
            if($item->id == $this->country) {
                $country = $item->title;                
                break;
            }                           
        }

        if(!Cache::has('cities')) { Cache::put('cities', City::all()); }
        $City = Cache::get('cities');
        $city = '';
        foreach ($City as $item) {
            if($item->id == $this->city) {
                $city = $item->title;                
                break;
            }                           
        }

        if(!Cache::has('images')) { Cache::put('images', Image::all()); }
        $Image = Cache::get('images');
        $image = '';
        foreach ($Image as $item) {
            if($item->user_id == $this->id) {
                $image = $item->url;
                break;
            }                           
        }
        
        if($this->role == "Исполнитель") {
            $birthdate = Carbon::createFromFormat('Y-m-d', $this->age);
            $currentDate = Carbon::now();
            $current_age = $currentDate->diffInYears($birthdate);

            if(!Cache::has('countries')) { Cache::put('countries', Country::all()); }
            $Citizen = Cache::get('countries');
            $citizen = '';
            foreach ($Citizen as $item) {
                if($item->id == $this->citizen) {
                    $citizen = $item->title;                
                    break;
                }                           
            }

            if(!Cache::has('criminals')) { Cache::put('criminals', Criminal::all()); }
            $Criminal = Cache::get('criminals');
            $criminal = '';
            foreach ($Criminal as $item) {
                if($item->id == $this->criminal) {
                    $criminal = $item->title;                
                    break;
                }                           
            }

            if(!Cache::has('movings')) { Cache::put('movings', Moving::all()); }
            $Moving = Cache::get('movings');
            $moving = '';
            foreach ($Moving as $item) {
                if($item->id == $this->moving) {
                    $moving = $item->title;                
                    break;
                }                           
            }

            if(!Cache::has('smokings')) { Cache::put('smokings', Smoking::all()); }
            $Smoking = Cache::get('smokings');
            $smoking = '';
            foreach ($Smoking as $item) {
                if($item->id == $this->smoking) {
                    $smoking = $item->title;                
                    break;
                }                           
            }

            if(!Cache::has('alcohols')) { Cache::put('alcohols', Alcohol::all()); }
            $Alcohol = Cache::get('alcohols');
            $alcohol = '';
            foreach ($Alcohol as $item) {
                if($item->id == $this->alcohol) {
                    $alcohol = $item->title;                
                    break;
                }                           
            }

            if(!Cache::has('statuses')) { Cache::put('statuses', Status::all()); }
            $Status = Cache::get('statuses');
            $status = '';
            foreach ($Status as $item) {
                if($item->id == $this->status) {
                    $status = $item->title;                
                    break;
                }                           
            }

            if(!Cache::has('religions')) { Cache::put('religions', Religion::all()); }
            $Religion = Cache::get('religions');
            $religion = '';
            foreach ($Religion as $item) {
                if($item->id == $this->religion) {
                    $religion = $item->title;                
                    break;
                }                           
            }

            return [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,                               
                'role' => $this->role,
                'confirmed' => $this->confirmed,
                'surname' => $this->surname,
                'patronymic' => $this->patronymic,
                'phone_number' => "+380" . $this->phone,
                'additional_phone_number' => "+380" . $this->additional_phone,
                'phone' => $this->phone,
                'additional_phone' => $this->additional_phone,
                'gender' => $this->gender,
                'age' => $this->age,
                'current_age' => $current_age,
                'right_work' => $this->right_work,
                'drive' => $this->drive,
                'night_work' => $this->night_work,
                'animal_work' => $this->animal_work,
                'swimming' => $this->swimming,
                'about' => $this->about,
                'is_babysitting' => $this->is_babysitting,
                'is_nurse' => $this->is_nurse,
                'is_housekeeper' => $this->is_housekeeper,            
                
                'country' => $country,
                'city' => $city,
                'citizen' => $citizen,
                'criminal' => $criminal,
                'moving' => $moving,
                'smoking' => $smoking,
                'alcohol' => $alcohol,
                'status' => $status, 
                'religion' => $religion,           
                'image' => $image,                

                'country_id' => $this->country,
                'city_id' => $this->city,
                'citizen_id' => $this->citizen,
                'criminal_id' => $this->criminal,
                'moving_id' => $this->moving,
                'smoking_id' => $this->smoking,
                'alcohol_id' => $this->alcohol,
                'status_id' => $this->status, 
                'religion_id' => $this->religion,
            ];
        } else {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,                
                'role' => $this->role,
                'confirmed' => $this->confirmed,
                'surname' => $this->surname,
                'patronymic' => $this->patronymic,
                'phone_number' => "+380" . $this->phone,
                'additional_phone_number' => "+380" . $this->additional_phone,
                'phone' => $this->phone,
                'additional_phone' => $this->additional_phone,
                'country' => $country,
                'city' => $city,
                'image' => $image,
                
                'country_id' => $this->country,
                'city_id' => $this->city,
            ];
        }
    }
}
