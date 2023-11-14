<?php

namespace App\Http\Resources\forms;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\HousekeeperDutie;

class KeeperdutieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('housekeeperduties')) { Cache::put('housekeeperduties', HousekeeperDutie::all()); }
        $HousekeeperDutie = Cache::get('housekeeperduties');        
        foreach ($HousekeeperDutie as $item) {
            if($item->id == $this->keeperdutie_id) {
                return [
                    'id' => $this->keeperdutie_id,
                    'title' => $item->title            
                ];                
            }                           
        }        
    }
}
