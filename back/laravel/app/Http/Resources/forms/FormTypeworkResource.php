<?php

namespace App\Http\Resources\forms;

use Illuminate\Support\Facades\Cache;                                           
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\TypeOfWork;

class FormTypeworkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('typeofworks')) { Cache::put('typeofworks', TypeOfWork::all()); }
        $TypeOfWork = Cache::get('typeofworks');        
        foreach ($TypeOfWork as $item) {
            if($item->id == $this->typework_id) {
                return [
                    'id' => $this->typework_id,
                    'title' => $item->title            
                ];                
            }                           
        }
    }
}
