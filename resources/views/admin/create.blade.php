@extends('layouts.master')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center font-weight-light">
                Write a New Article
            </h1>
        </div>
    </div>
    <div class="row slideBottom">
        <div class="col-md-8 offset-md-2 mt-3">
            <div class="card bg-light mb-4">
                <div class="card-body">
                    <form action="{{ route('admin.create') }}" method="post">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ? old('title') : '' }}">
                        </div>
                        <!--<div class="form-group">
                            <label for="content">Content</label>
                            <input type="text" class="form-control" id="content" name="content" value="{{ old('content') ? old('content') : '' }}">
                        </div>-->
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" rows="13" value="{{ old('content') ? old('content') : '' }}"></textarea>
                        </div>
                        @foreach($tags as $tag)
                            <div class="checkbox form-check d-inline mx-1">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="tags[]" value="{{ $tag->id }}">
                                        {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-block btn-lg btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var editor_config = {
            path_absolute : "{{ URL::to('/') }}/",
            selector : "textarea",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.grtElementByTagName('body')[0].clientHeight;
                var cmsURL = editor_config.path_absolute+'laravel-filemanaget?field_name'+field_name;
                if (type = 'image') {
                cmsURL = cmsURL+'&type=Images';
                } else {
                cmsUrl = cmsURL+'&type=Files';
                }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizeble : 'yes',
                close_previous : 'no'
                });
            }
        };
        tinymce.init(editor_config);
    </script>
@endsection