<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Requests\AlbumRequest;

class AlbumController extends Controller
{
    /**
     * 相册页
     *
     * @return View
     */
    public function index()
    {
        $albums = Album::withCount('images')->get();

        return view('album', compact('albums'));
    }

    public function show(Album $album)
    {
        $album->load('images');

        return view('album.show', compact('album'));
    }

    /**
     * 保存新的相册
     *
     * @param AlbumRequest $request
     * @param Album $album
     * @return Response
     */
    public function store(AlbumRequest $request, Album $album)
    {
        $album->name = $request->name;
        $album->save();

        return response(['message' => '已创建「' . $request->name . '」相册']);
    }
}
