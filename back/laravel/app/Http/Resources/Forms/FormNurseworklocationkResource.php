<?php

namespace App\Http\Resources\forms;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\WorkLocation;

class FormNurseworklocationkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('workLocations')) { Cache::put('workLocations', WorkLocation::all()); }
        $WorkLocation = Cache::get('workLocations');        
        foreach ($WorkLocation as $item) {
            if($item->id == $this->nurseworklocation_id) {
                return [
                    'id' => $this->nurseworklocation_id,
                    'title' => $item->title            
                ];                
            }                           
        }
    }
}
