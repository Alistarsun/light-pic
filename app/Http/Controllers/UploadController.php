<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * 图片上传页面
     *
     * @return View
     */
    public function uploadPage()
    {
        return view('upload');
    }

    /**
     * 保存上传图片
     *
     * @param Request $request
     * @return View
     */
    public function saveImage(Request $request)
    {
        $file = $request->file('upload-image');

        $image = new Image([
            'name' => $file->getClientOriginalName(),
            'path' => $file->store('public'),
        ]);
        $image->save();

        return redirect(route('home'));
    }
}
