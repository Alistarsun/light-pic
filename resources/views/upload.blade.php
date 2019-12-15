@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col col-lg-8">
            <form method="post" action="{{ route('save-image') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="custom-file">
                        <input name="upload-image" type="file" class="custom-file-input" id="upload-image" accept="image/png,image/gif">
                        <label class="custom-file-label" for="upload-image">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="description" rows="3">描述...</textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-md">保存</button>
            </form>
        </div>
    </div>
</div>
@endsection