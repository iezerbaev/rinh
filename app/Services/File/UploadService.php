<?php


namespace App\Services\File;


use Illuminate\Auth\AuthManager;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadService
{
    /**
     * @param UploadedFile $file
     * @param HasMedia $model
     * @param string $group
     * @return string
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function upload(UploadedFile $file, HasMedia $model, string $group = 'default'): string
    {
        $name = md5_file($file->getRealPath());
        $extension = $file->getClientOriginalExtension();
        $fileName = "$name.$extension";
        $media = $model->addMedia($file)
            ->setName($name)
            ->setFileName($fileName)
            ->toMediaCollection($group);
        return $media->getUrl();
    }

    /**
     * @param HasMedia $model
     * @param string $group
     * @return bool
     */
    public function deleteAllByCollection(HasMedia $model, string $group = 'default'): void
    {
        $model->getMedia($group)->each(fn(Media $media) => $media->delete());
    }
}
