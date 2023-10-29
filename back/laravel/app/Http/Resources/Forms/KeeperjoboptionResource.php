<?php

namespace App\Http\Resources\Forms;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\JobOption;

class KeeperjoboptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('joboptions')) { Cache::put('joboptions', JobOption::all()); }
        $JobOption = Cache::get('joboptions');        
        foreach ($JobOption as $item) {
            if($item->id == $this->keeperjoboption_id) {
                return [
                    'id' => $this->keeperjoboption_id,
                    'title' => $item->title            
                ];                
            }                           
        }
    }
}
