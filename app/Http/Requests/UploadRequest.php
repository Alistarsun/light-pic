<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    public function rules()
    {
        return [
            'upload-image' => 'required|image',
        ];
    }
}
