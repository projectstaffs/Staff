<?php

namespace App\Http\Resources\Forms\Nurse;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\NurseTypeOfWork;

class FormNursetypeworkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('nursetypeofworks')) { Cache::put('nursetypeofworks', NurseTypeOfWork::all()); }
        $NurseTypeOfWork = Cache::get('nursetypeofworks');        
        foreach ($NurseTypeOfWork as $item) {
            if($item->id == $this->nursetypework_id) {
                return [
                    'id' => $this->nursetypework_id,
                    'title' => $item            
                ];                
            }                           
        }
    }
}
