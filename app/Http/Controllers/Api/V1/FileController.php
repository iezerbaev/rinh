<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\Upload\Thumbnail as ThumbnailRequest;
use App\Services\File\UploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Throwable;

class FileController extends Controller
{
    private UploadService $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    /**
     * @param ThumbnailRequest $request
     * @return JsonResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws Throwable
     */
    public function upload(ThumbnailRequest $request): JsonResponse
    {
        $file = $request->file('thumbnail');
        $this->uploadService->deleteAllByCollection(Auth::getUser(), 'thumbnails');
        $url = $this->uploadService->upload($file, $request->user(), 'thumbnails');
        return response()->json([
            'success' => true,
            'url' => $url
        ]);
    }

    public function delete(): JsonResponse
    {
        $user = Auth::getUser();
        if ($user !== null) {
            $this->uploadService->deleteAllByCollection($user, 'thumbnails');
            return response()->json([
                'success' => true,
                'url' => $user->thumbnail
            ]);
        }
    }
}
