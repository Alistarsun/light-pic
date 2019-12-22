<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|between:1,10|bail',
        ];
    }
}
