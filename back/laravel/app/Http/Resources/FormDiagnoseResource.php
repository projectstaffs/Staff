<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\Diagnose;

class FormDiagnoseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = Diagnose::where('id', $this->diagnose_id)->value('title');
        return [
            'id' => $this->diagnose_id,
            'title' => $title            
        ];
    }
}
