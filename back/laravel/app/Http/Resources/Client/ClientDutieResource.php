<?php

namespace App\Http\Resources\Client;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\BabysittingDutie;

class ClientDutieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('babysittingduties')) { Cache::put('babysittingduties', BabysittingDutie::all()); }
        $Babysittingdutie = Cache::get('babysittingduties');        
        foreach ($Babysittingdutie as $item) {
            if($item->id == $this->dutie_id) {
                return [
                    'id' => $this->dutie_id,
                    'title' => $item            
                ];                
            }                           
        }
    }
}
