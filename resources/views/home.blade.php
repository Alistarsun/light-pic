@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start mt-4">
        <div class="col-lg-12 shadow-sm p-3 mb-5 bg-white rounded">
            <h3 class="p-1">{{ $path }}
                <a href="{{ route('home', ['path' => $lastPath]) }}">{{ $path == ''?'/':'返回' }}</a>
            </h3>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">名称</th>
                            <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($directories as $directory)
                        <tr>
                            <td>
                                <i class="fa fa-folder fa-fw"></i>
                                {{ $directory }}
                            </td>
                            <td>
                                <a href="{{ route('home', ['path' => $directory]) }}">查看</a>
                            </td>
                        </tr>
                        @endforeach
                        @foreach($files as $file)
                        <tr>
                            <td>
                                <i class="fa fa-file-image fa-fw"></i>
                                {{ $file }}
                            </td>
                            <td>
                                <a href="{{ asset($path . '/' . $file) }}">查看</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection