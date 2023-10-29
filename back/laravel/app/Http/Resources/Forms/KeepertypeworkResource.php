<?php

namespace App\Http\Resources\Forms;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\HouseKeeperTypeOfWork;

class KeepertypeworkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('housekeepertypeofworks')) { Cache::put('housekeepertypeofworks', HouseKeeperTypeOfWork::all()); }
        $HousekeeperTypeOfWork = Cache::get('housekeepertypeofworks');        
        foreach ($HousekeeperTypeOfWork as $item) {
            if($item->id == $this->keepertypework_id) {
                return [
                    'id' => $this->keepertypework_id,
                    'title' => $item->title            
                ];                
            }                           
        }
    }
}
