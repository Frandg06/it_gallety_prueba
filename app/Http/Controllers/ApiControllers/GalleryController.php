<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateGalleryItemRequest;
use App\Http\Services\GalleryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function __construct(private readonly GalleryService $gallery_service) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $response = $this->gallery_service->retrieve();
        return response()->json(['status' => 'ok', 'data' => $response]);
    }

    public function show(Request $request): JsonResponse
    {
        $response = $this->gallery_service->show($request->id);
        return response()->json(['status' => 'ok', ...$response]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryItemRequest $request, int $id): JsonResponse
    {
        $data = $request->safe()->only([
            'language',
            'title',
            'serieName',
            'artist',
            'year',
            'inventoryId',
            'status',
            'img',
        ]);

        $response = $this->gallery_service->update($data, $id);

        return response()->json(['status' => 'ok', 'data' => $response]);
    }
}
