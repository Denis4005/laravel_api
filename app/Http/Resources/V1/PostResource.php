<?php

namespace App\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Route;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $routeName = Route::currentRouteName();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->when((($routeName === 'posts.show') || ($routeName === 'posts.update') || ($routeName === 'posts.store')), $this->content),
            'categoryId' => $this->category_id,
            'categoryName' => $this->category->title,
            'created' => Carbon::parse($this->created_at)->timezone('Europe/Moscow')->format('d.m.Y H:i:s'),
            'updated' => Carbon::parse($this->updated_at)->timezone('Europe/Moscow')->format('d.m.Y H:i:s'),
        ];
    }
}
