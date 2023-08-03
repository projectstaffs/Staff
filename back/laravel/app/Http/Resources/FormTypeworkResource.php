<?php

namespace App\Http\Resources;

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
        $title = TypeOfWork::where('id', $this->typework_id)->value('title');
        return [
            'id' => $this->typework_id,
            'title' => $title            
        ];
    }
}
