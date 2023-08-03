<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\data\NurseTypeOfWork;

class FormNursetypeworkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = NurseTypeOfWork::where('id', $this->nursetypework_id)->value('title');
        return [
            'id' => $this->nursetypework_id,
            'title' => $title            
        ];
    }
}
