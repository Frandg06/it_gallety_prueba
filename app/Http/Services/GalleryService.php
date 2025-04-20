<?php

namespace App\Http\Services;

use App\Http\Resources\GalleryItemResource;
use App\Models\GalleryItem;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryService
{
    public function retrieve(): JsonResource
    {
        $query = GalleryItem::with('artist', 'language', 'status')->get();
        return GalleryItemResource::collection($query);
    }

    public function show(int $id): array
    {
        $query = GalleryItem::where('id', $id)->with('artist', 'language', 'status')->first();

        if (!$query)  throw new \Exception('No se ha encontrado la obra', 404);

        $next = GalleryItem::where('id', '>', $id)->orderBy('id')->first();
        $prev = GalleryItem::where('id', '<', $id)->orderBy('id', 'desc')->first();

        $next = $next ? $next->id : null;
        $prev = $prev ? $prev->id : null;

        return [
            "data" => new GalleryItemResource($query),
            "next" => $next,
            "prev" => $prev,
        ];
    }

    public function update(array $data, int $id): GalleryItemResource
    {
        $item = GalleryItem::find($id);

        $itemToUpdate = [
            'language_id' => $data['language'],
            'title' => $data['title'],
            'serie_name' => $data['serieName'],
            'artist_id' => $data['artist'],
            'year' => $data['year'],
            'inventory_id' => $data['inventoryId'],
            'status_id' => $data['status'],
        ];

        if (isset($data['img'])) {
            $file = $data['img'];
            $url = $this->saveImage($file);
            $itemToUpdate['img_url'] = $url;
        }

        $item->update($itemToUpdate);

        return new GalleryItemResource($item->refresh());
    }

    private function saveImage($file)
    {
        if (!$file) throw new \Exception('No se ha encontrado la imagen', 404);
        $ruta = public_path('/image');
        $file->move($ruta, $file->getClientOriginalName());
        return '/image/' . $file->getClientOriginalName();
    }
}
