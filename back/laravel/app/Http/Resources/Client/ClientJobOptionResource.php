<?php

namespace App\Http\Resources\Client;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\JobOption;

class ClientJoboptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('joboptions')) { Cache::put('joboptions', JobOption::all()); }
        $Joboption = Cache::get('joboptions');        
        foreach ($Joboption as $item) {
            if($item->id == $this->joboption_id) {
                return [
                    'id' => $this->joboption_id,
                    'title' => $item->title            
                ];                
            }                           
        }
    }
}
