@extends('admin.layouts.layout')
@push('styles')
@endpush
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Form Layouts</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Form Layouts</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <form class="needs-validation" novalidate method="post" action="{{ route('admin.blog.update', ['id' => $blog->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">New Blog</h4>
                            <p class="card-title-desc">No pain, no gain</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="blog-title" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control" id="blog-title" placeholder="First name"
                                            value="{{ $blog->translation()->title }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Title cannot be empty.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="blog-title" class="form-label">URL: </label>
                                        <a href="{{ URL($blog->translation()->slug) }}" target="_blank">{{ URL($blog->translation()->slug) }}</a>
                                        {{-- <input type="text" name="title" class="form-control" id="blog-title" placeholder="First name"
                                            value="{{ URL($blog->translation()->slug) }}" required> --}}
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            URL cannot be empty.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="editor" class="form-label">Body</label>
                                        <textarea name="body" class="form-control" id="editor" required
                                            rows="30">
                                            {{ $blog->translation()->body }}
                                        </textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Content cannot be empty.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
                <div class="col-xl-3">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thumnail</h4>
                            <div class="thumbnail-box" id="uploadThumbnailBlog">
                                <img src="{{ $blog->getThumbnail() }}" id="thumbnail" />
                                @if(is_null($blog->thumbnail))
                                 <div id="upload-thumbnail-title">Upload image here</div>
                                @endif
                            </div>
                            <input type="hidden" name="thumbnail" value="{{ $blog->thumbnail }}" id="thumbnail_input"/>
                        </div>
                    </div>

                    <!-- end card -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Topics</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Single Select</label>
                                        <select class="select2 form-control" name="topic_id"
                                            data-placeholder="Choose ...">
                                            @forelse($topics as $topic)
                                                <option value="{{ $topic->id }}" @if($blog->topic_id == $topic->id) selected @endif>{{ $topic->name }}</option>
                                            @empty
                                                <option value="">Have not data</option>
                                            @endforelse
                                        </select>
                                    </div>
            
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Read Time</label><br>
                                    <input type="text" name="read_time" class="form-control" id="read_time" value="{{ $blog->read_time }}" required/>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Read Time cannot be empty.
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Status</label><br>
                                    <input type="checkbox" name="status" id="status" value="{{ $blog->status }}" switch="none" checked />
                                    <label for="status" data-on-label="On" data-off-label="Off"></label>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit">Publish</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Meta SEO</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="meta-title" class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" id="meta-title"
                                            placeholder="Meta title" value="{{ $blog->translation()->meta_title }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Meta title cannot be empty
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="meta-desc" class="form-label">Meta Description</label>
                                        <textarea name="meta_desc" class="form-control" id="meta-desc" required>{{ $blog->translation()->meta_desc }}</textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Meta Description cannot be empty
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="meta-key" class="form-label">Meta Keywords</label>
                                        <input type="text" name="meta_key" class="form-control" id="meta-key"
                                            placeholder="Keywords" value="{{ $blog->translation()->meta_key }}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Meta keywords cannot be empty
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </form>

    </div> <!-- container-fluid -->
</div>
@endsection
@push('scripts')
<script>
    const editor = CKEDITOR.replace('body', {
            filebrowserUploadUrl: "{{ route('admin.blog.ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            extraPlugins: 'codesnippet',
            codeSnippet_theme: 'monokai_sublime',
            height: 356,
            removeButtons: 'PasteFromWord'
    });
    CKFinder.setupCKEditor( editor );
    // let myDropzone = new Dropzone("div#dropzone", { url: "{{ route('admin.blog.ckeditor.upload', ['_token' => csrf_token() ]) }}"});

    var uploadBtn = document.getElementById( 'uploadThumbnailBlog' );
    uploadBtn.onclick = function(e) {
        e.preventDefault();
        selectFileWithCKFinder( 'ckfinder-input-1' );
    };
    function selectFileWithCKFinder( elementId ) {
        CKFinder.modal( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    var output = document.getElementById( elementId );
                    // document.getElementById('upload-thumbnail-title').style.display = 'none';
                    const outputImg = document.getElementById('thumbnail');
                    outputImg.setAttribute('src', file.getUrl());
                    const thumbnailUrl = new URL(file.getUrl());
                    document.getElementById('thumbnail_input').setAttribute('value', thumbnailUrl.pathname);
                } );

                finder.on( 'file:choose:resizedImage', function( evt ) {
                    var output = document.getElementById( elementId );
                    output.value = evt.data.resizedUrl;
                } );
            }
        } );
    }

    $('input[name=status]').change(function(e) {
        $(this).val(1);
    })
</script>
@endpush