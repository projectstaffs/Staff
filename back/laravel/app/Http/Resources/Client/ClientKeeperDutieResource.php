<?php

namespace App\Http\Resources\Client;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\HouseKeeperDutie;

class ClientKeeperdutieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('housekeeperduties')) { Cache::put('housekeeperduties', HouseKeeperDutie::all()); }
        $Nursedutie = Cache::get('housekeeperduties');        
        foreach ($Nursedutie as $item) {
            if($item->id == $this->keeperdutie_id) {
                return [
                    'id' => $this->keeperdutie_id,
                    'title' => $item->title            
                ];                
            }                           
        }
    }
}
