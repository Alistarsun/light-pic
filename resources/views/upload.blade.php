@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-start mt-4">

        <div class="col-lg-12 shadow-sm p-3 mb-5 bg-white rounded">
            <form method="post" action="{{ route('images.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select class="selectpicker show-tick" data-width="100%" data-live-search="true" name="album_id" required>
                        @foreach($albums as $album)
                        <option value="{{ $album->id }}">{{ $album->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input name="upload_image" type="file" class="custom-file-input" id="upload-image" accept="image/png,image/gif" required>
                        <label class="custom-file-label" for="upload_image">Choose file</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-md">保存</button>
            </form>
        </div>

    </div>
</div>
@endsection

@section('scriptsAfterJs')
<script>
    $('.selectpicker').selectpicker();
</script>
@endsection