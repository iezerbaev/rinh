<?php

namespace App\Http\Requests\File\Upload;

use Illuminate\Auth\AuthManager;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

class Thumbnail extends FormRequest
{
    public function authorize(AuthManager $authManager): bool
    {
        return !$authManager->guard()->guest();
    }

    public function rules(): array
    {
        return [
            'thumbnail' => 'required|file|max:1024|dimensions:ratio:1/1|mimes:jpeg,jpg,png'
        ];
    }

    public function getFile(): UploadedFile
    {
        return $this->file('thumbnail');
    }
}
