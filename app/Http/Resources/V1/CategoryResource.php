<?php

namespace App\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'created' => Carbon::parse($this->created_at)->timezone('Europe/Moscow')->format('d.m.Y H:i:s'),
            'updated' => Carbon::parse($this->updated_at)->timezone('Europe/Moscow')->format('d.m.Y H:i:s'),
        ];
    }
}
