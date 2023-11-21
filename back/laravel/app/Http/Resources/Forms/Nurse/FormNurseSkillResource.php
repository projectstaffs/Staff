<?php

namespace App\Http\Resources\Forms\Nurse;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\NursingSkill;

class FormNurseskillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('nursingskills')) { Cache::put('nursingskills', NursingSkill::all()); }
        $NursingSkill = Cache::get('nursingskills');        
        foreach ($NursingSkill as $item) {
            if($item->id == $this->nurseskill_id) {
                return [
                    'id' => $this->nurseskill_id,
                    'title' => $item->title            
                ];                
            }                           
        }
    }
}
