<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryItemResource extends JsonResource
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
            'serieName' => $this->serie_name,
            'year' => $this->year,
            'inventoryId' => $this->inventory_id,
            'img' => $this->img_url,
            'language' => [
                'name' => $this->language->name,
                'id' => $this->language->id,
            ],
            'artist' => [
                'name' => $this->artist->name,
                'id' => $this->artist->id,
            ],
            'status' => [
                'name' => $this->status->name,
                'id' => $this->status->id,
            ],
        ];
    }
}
