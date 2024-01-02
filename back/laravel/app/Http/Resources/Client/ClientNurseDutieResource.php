<?php

namespace App\Http\Resources\Client;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\NurseDutie;

class ClientNursedutieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('nurseduties')) { Cache::put('nurseduties', NurseDutie::all()); }
        $Nursedutie = Cache::get('nurseduties');        
        foreach ($Nursedutie as $item) {
            if($item->id == $this->nursedutie_id) {
                return [
                    'id' => $this->nursedutie_id,
                    'title' => json_decode($item->title)            
                ];                
            }                           
        }
    }
}
