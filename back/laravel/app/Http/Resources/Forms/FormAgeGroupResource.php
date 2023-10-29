<?php

namespace App\Http\Resources\Forms;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\AgeGroup;

class FormAgegroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('agegroups')) { Cache::put('agegroups', AgeGroup::all()); }
        $AgeGroup = Cache::get('agegroups');        
        foreach ($AgeGroup as $item) {
            if($item->id == $this->agegroup_id) {
                return [
                    'id' => $this->agegroup_id,
                    'title' => $item->title            
                ];                
            }                           
        }
    }
}
