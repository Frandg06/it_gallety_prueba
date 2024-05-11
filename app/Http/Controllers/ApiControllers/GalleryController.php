<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateGalleryItemRequest;
use App\Http\Resources\GalleryItemResource;
use App\Http\Resources\GalleryItemUpdateResource;
use App\Models\GalleryItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $query = GalleryItem::with('artist', 'language', 'status')->get();

        $data = GalleryItemResource::collection($query);

        return response()->json(['status'=> 'ok', 'data' => $data]);
    }

    public function getSpecificItem(Request $request) : JsonResponse
    {
        $query = GalleryItem::where('id', $request->id)->with('artist', 'language', 'status')->first();
        
        if(!$query)  return response()->json(['status'=> 'error', 'error' => 'No se ha encontrado la obra'], 404);

        $next = GalleryItem::where('id', '>', $request->id)->orderBy('id')->first();
        $prev = GalleryItem::where('id', '<', $request->id)->orderBy('id', 'desc')->first();

        $next = $next ? $next->id : null;
        $prev = $prev ? $prev->id : null;

        $data =  new GalleryItemResource($query);

        return response()->json(['status'=> 'ok','data' => $data, 'next'=> $next, 'prev' => $prev]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryItemRequest $request) : JsonResponse
    {

        $item = GalleryItem::find($request->id);
        $originalData = $item->getOriginal();
        
        $data = new GalleryItemUpdateResource($request);
        $data = $data->toArray($request);

        if ($request->file('img')) {
            $file = $request->file('img');
            $url = $this->saveImage($file);
            $data['img_url'] = $url;
        }

        $item->update($data);

        $updated = $originalData != $item->getAttributes();

        if($updated) return response()->json(["status" => "ok"]);

        return response()->json(Response::HTTP_NO_CONTENT);

    }

    public function saveImage($file) {
        $ruta = public_path('/image');
        $file->move($ruta, $file->getClientOriginalName());
        return '/image/'.$file->getClientOriginalName();
    }

}
