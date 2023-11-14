<?php

namespace App\Http\Resources\forms;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\BabysittingDutie;

class FormDutieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('babysittingduties')) { Cache::put('babysittingduties', BabysittingDutie::all()); }
        $BabysittingDutie = Cache::get('babysittingduties');        
        foreach ($BabysittingDutie as $item) {
            if($item->id == $this->dutie_id) {
                return [
                    'id' => $this->dutie_id,
                    'title' => $item->title            
                ];                
            }                           
        }
    }
}
