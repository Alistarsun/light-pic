<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $path = $request->input('path', '');
        $lastPath = mb_substr($path, 0, mb_strrpos($path, '/'));

        $directories = Storage::directories($path);
        $files = Storage::files($path);

        return view('home', compact('path', 'lastPath', 'directories', 'files'));
    }

    /**
     * 相册页
     *
     * @param Request $request
     * @return View
     */
    public function album(Request $request)
    {
        $albums = Album::all();

        return view('album', compact('albums'));
    }
}
