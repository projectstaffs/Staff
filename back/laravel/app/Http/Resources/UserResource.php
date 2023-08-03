<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\forms\UserLanguages;
use App\Models\user\Image;
use App\Http\Resources\UserLanguagesResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {      
        $image = null;
        $photo = Image::select('preview_url')->where('user_id', $this->id)->first();
        if($photo){$image = $photo["preview_url"];}else {$image = '';}
        if($this->role == "Исполнитель") {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,                               
                'role' => $this->role,
                'confirmed' => $this->confirmed,
                'surname' => $this->surname,
                'patronymic' => $this->patronymic,
                'phone' => $this->phone,
                'additional_phone' => $this->additional_phone,
                'gender' => $this->gender,
                'age' => $this->age,
                'right_work' => $this->right_work,
                'drive' => $this->drive,
                'night_work' => $this->night_work,
                'animal_work' => $this->animal_work,
                'swimming' => $this->swimming,
                'about' => $this->about,
                'is_babysitting' => $this->is_babysitting,
                'is_nurse' => $this->is_nurse,
                'is_housekeeper' => $this->is_housekeeper,            
                'country' => $this->get_country->title,
                'city' => $this->get_city->title,
                'citizen' => $this->get_citizen->title,
                'criminal' => $this->get_criminal->title,
                'moving' => $this->get_moving->title,
                'smoking' => $this->get_smoking->title,
                'alcohol' => $this->get_alcohol->title,
                'status' => $this->get_status->title, 
                'religion' => $this->get_religion->title,           
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
                'phone' => $this->phone,
                'additional_phone' => $this->additional_phone,
                'country' => $this->get_country->title,
                'city' => $this->get_city->title,
                'image' => $image,
                
                'country_id' => $this->country,
                'city_id' => $this->city,
            ];
        }
    }
}
