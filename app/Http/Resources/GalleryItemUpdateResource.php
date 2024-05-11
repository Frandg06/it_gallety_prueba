<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryItemUpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            "serie_name" => isset($request->serieName) ? $request->serieName : null,
            "year" => isset($request->year) ? $request->year : null,
            "title" => $request->title,
            "inventory_id" => $request->inventoryId,
            "artist_id" => $request->artist,
            "status_id" => $request->status,
            "language_id" => $request->language,
        ];
    }
}
