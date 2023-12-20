<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\User\Image;
use App\Models\Data\City;
use App\Models\Data\Country;
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
                $image = $item->preview_url;
                break;
            }                           
        }        
        
            $birthdate = Carbon::createFromFormat('Y-m-d', $this->age);
            $currentDate = Carbon::now();
            $current_age = $currentDate->diffInYears($birthdate);

            return [
                'id' => $this->id,
                'name' => $this->getTranslations('name'),
                'email' => $this->email,                               
                'role' => $this->role,
                'confirmed' => $this->confirmed,
                'surname' => $this->surname,
                'phone_number' => "+380" . $this->phone,
                'phone' => $this->phone,
                'gender' => $this->gender,
                'age' => $this->age,
                'current_age' => $current_age,                
                'animal_work' => $this->animal_work,                
                'about' => $this->about,
                'is_babysitting' => $this->is_babysitting,
                'is_nurse' => $this->is_nurse,
                'is_housekeeper' => $this->is_housekeeper,            
                
                'country' => $country,
                'city' => $city,                           
                'image' => $image,
                'country_id' => $this->country,
                'city_id' => $this->city                
            ];
        
    }
}
