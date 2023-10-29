<?php

namespace App\Http\Resources\Forms;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\HouseKeeperPreference;

class KeeperpreferenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('housekeeperpreferences')) { Cache::put('housekeeperpreferences', HouseKeeperPreference::all()); }
        $HousekeeperPreference = Cache::get('housekeeperpreferences');        
        foreach ($HousekeeperPreference as $item) {
            if($item->id == $this->keeperpreference_id) {
                return [
                    'id' => $this->keeperpreference_id,
                    'title' => $item->title            
                ];                
            }                           
        }
    }
}
