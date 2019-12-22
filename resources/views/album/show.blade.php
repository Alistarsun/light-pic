@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-start mt-4">
        <div class="col-lg-12 shadow-sm p-3 mb-5 bg-white rounded">
            <h2>{{ $album->name }}</h2>

            <div class="table-responsive mt-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">文件名</th>
                            <th scope="col">路径</th>
                            <th width="20%" scope="col">上传时间</th>
                            <th width="20%" scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($images as $image)
                        <tr>
                            <td>
                                <i class="fa fa-image fa-fw"></i>
                                {{ $image->name }}
                            </td>
                            <td>
                                {{ $image->path }}
                            </td>
                            <td>{{ $image->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ url($image->path) }}" download="{{ $image->name }}">下载</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <hr>
                {{ $images->links() }}
            </div>
        </div>
    </div>
</div>
@endsection