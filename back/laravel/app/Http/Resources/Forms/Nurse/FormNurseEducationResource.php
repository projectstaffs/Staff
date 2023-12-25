<?php

namespace App\Http\Resources\Forms\Nurse;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\Education;

class FormNurseeducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('educations')) { Cache::put('educations', Education::all()); }
        $Education = Cache::get('educations');        
        foreach ($Education as $item) {
            if($item->id == $this->nurseeducation_id) {
                return [
                    'id' => $this->nurseeducation_id,
                    'title' => $item            
                ];                
            }                           
        }
    }
}
