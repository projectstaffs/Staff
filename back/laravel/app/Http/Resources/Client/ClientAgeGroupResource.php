<?php

namespace App\Http\Resources\Client;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\AgeGroup;

class ClientAgegroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('agegroups')) { Cache::put('agegroups', AgeGroup::all()); }
        $Agegroup = Cache::get('agegroups');        
        foreach ($Agegroup as $item) {
            if($item->id == $this->agegroup_id) {
                return [
                    'id' => $this->agegroup_id,
                    'title' => $item            
                ];                
            }                           
        }
    }
}
