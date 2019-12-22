<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function rules()
    {
        switch (request()->getMethod()) {
            case 'POST':
                return [
                    'album_id' => 'required|exists:albums,id',
                    'upload_image' => 'required|image',
                ];
        }
        return [];
    }
}
