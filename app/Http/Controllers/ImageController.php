<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Requests\ImageRequest;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * 图片上传页
     *
     * @param Album $album
     * @return View
     */
    public function create(Album $album)
    {
        $albums = $album->query()->select('id', 'name')->get();

        return view('upload', compact('albums'));
    }

    /**
     * 保存上传图片
     *
     * @param ImageRequest $request
     * @param Image $image
     * @return View
     */
    public function store(ImageRequest $request, Image $image)
    {
        // 保存图片
        $file = $request->file('upload_image');
        $path = $file->store(date('Y_m_d'));

        // 图片属性
        $image->name = $file->getClientOriginalName();
        $image->path = $path;

        // 添加关联
        $image->album()->associate($request->album_id);

        $image->save();
        return redirect(route('albums.index'));
    }
}
