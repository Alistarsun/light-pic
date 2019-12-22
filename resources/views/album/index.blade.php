@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-start mt-4">
        <div class="col-lg-12 shadow-sm p-3 mb-5 bg-white rounded">

            <div class="btn-group" role="group" aria-label="工具栏">
                <button type="button" class="btn btn-outline-primary" id="btn-add-album">添 加</button>
            </div>

            <div class="table-responsive mt-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">名称</th>
                            <th scope="col">数量</th>
                            <th width="20%" scope="col">更新时间</th>
                            <th width="20%" scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($albums as $album)
                        <tr>
                            <td>
                                <i class="fa fa-folder fa-fw"></i>
                                {{ $album->name }}
                            </td>
                            <td>
                                {{ $album->images_count }}
                            </td>
                            <td>{{ $album->updated_at->diffForHumans() }}</td>
                            <td>
                                <a class="mr-1" href="{{ route('albums.show', $album) }}">
                                    <i class="fa fa-eye fa-fw"></i>
                                </a>
                                <a class="album-edit-btn" href="javascript:;" data-name="{{ $album->name }}" data-id="{{ $album->id }}">
                                    <i class="fa fa-edit fa-fw"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <hr>
                {{ $albums->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptsAfterJs')
<script>
    $(document).ready(function() {
        $('#btn-add-album').click(function() {

            swal({
                title: "请输入相册名称：",
                content: "input",
                buttons: ['取消', '保存'],
            }).then((input) => {
                if (null !== input) {

                    axios.post('{{ route("albums.store") }}', {
                            name: input
                        })
                        .then(function(result) {
                            if (result.status == 200) {
                                swal("添加成功！", result.data.message, "success").then(() => {
                                    location.reload()
                                });
                            }
                        })
                        .catch(function(err) {
                            if (err.request && err.response.status == 422) {
                                let errors = err.response.data.errors
                                swal("参数错误！", errors[Object.keys(errors)[0]][0], "error");
                            } else {
                                swal("系统错误！", "请刷新浏览器后重试", "error");
                            }
                        });
                }
            });
        });

        $(".album-edit-btn").click((event) => {
            let name = event.currentTarget.dataset.name
            let albumId = event.currentTarget.dataset.id

            swal({
                title: "请输入相册新名称：",
                content: {
                    element: "input",
                    attributes: {
                        placeholder: name,
                        value: name,
                    },
                },
                buttons: ['取消', '保存'],

            }).then((input) => {
                console.log(input)
                if (input) {
                    axios.post(`/albums/${albumId}`, {
                            _method: "PUT",
                            name: input,
                        })
                        .then(function(result) {
                            if (result.status == 200) {
                                swal("编辑成功！", result.data.message, "success").then(() => {
                                    location.reload()
                                });
                            }
                        })
                        .catch(function(err) {
                            if (err.request && err.response.status == 422) {
                                let errors = err.response.data.errors
                                swal("参数错误！", errors[Object.keys(errors)[0]][0], "error");
                            } else {
                                swal("系统错误！", "请刷新浏览器后重试", "error");
                            }
                        });
                }
            });
        });
    });
</script>
@endsection