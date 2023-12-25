<?php

namespace App\Http\Resources\Forms\Nurse;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Data\Diagnose;

class FormDiagnoseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('diagnoses')) { Cache::put('diagnoses', Diagnose::all()); }
        $Diagnose = Cache::get('diagnoses');        
        foreach ($Diagnose as $item) {
            if($item->id == $this->diagnose_id) {
                return [
                    'id' => $this->diagnose_id,
                    'title' => $item            
                ];                
            }                           
        }
    }
}
