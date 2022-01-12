@extends('admin.layouts.layout')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Blogger</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li>Blog</li>
                            <li class="mr-5 ml-5"> > </li>
                            <li>Topic</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin.sections.message')
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title mb-3">Topic List</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="text-right mb-3">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalCreateTopic">Create</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">

                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Thumnail</th>
                                        <th>Name</th>
                                        <th>Blogs</th>
                                        <th></th>
                                        <th>Created At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($topics as $key => $topic)
                                    <tr>
                                        <th scope="row">{{ $topic->id }}</th>
                                        <td>
                                            <img src="{{ $topic->getThumbnail() }}" alt="Topic Thumbnail" class="thumbnail" />
                                        </td>
                                        <td>{{ $topic->name }}</td>
                                        <td>{{ $topic->blog_count }}</td>
                                        <th>{{ $topic->created_at }}</th>
                                        <th>
                                            @if($topic->isPublished())
                                                <a href="{{ route('admin.topic.update.status', [$topic->id]) }}" class="btn btn-success btn-sm" style="font-size: 20px">
                                                    <i class="fas fa-toggle-on"></i>
                                                </a>
                                            @else 
                                                <a href="{{ route('admin.topic.update.status', [$topic->id]) }}" class="btn btn-danger btn-sm" style="font-size: 20px">
                                                    <i class="fas fa-toggle-off"></i>
                                                </a>
                                            @endif
                                        </th>
                                        <th class="text-center">
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modelUpdateTopic{{ $topic->id }}">Edit</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                            @include('admin.pages.topic.edit')
                                        </th>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="6">Have not data</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">
                            {!! $topics->links('vendor.pagination.bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- container-fluid -->
</div>
@include('admin.pages.topic.create')

@endsection
@push('scripts')
<script>
    var button1 = document.getElementById( 'uploadTopicThumbnail' );
    button1.onclick = function(e) {
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
                    const outputImg = document.getElementById('previewTopicThumbnail');
                    outputImg.setAttribute('src', file.getUrl());
                    const thumbnailUrl = new URL(file.getUrl());
                    document.getElementById('topicThumbnailUrl').setAttribute('value', thumbnailUrl.pathname);
                } );

                finder.on( 'file:choose:resizedImage', function( evt ) {
                    var output = document.getElementById( elementId );
                    output.value = evt.data.resizedUrl;
                } );
            }
        } );
    }

    $('.uploadEditTopicThumbnail').click(function(e) {
        e.preventDefault();
        console.log($(this).data('topic_id'));
        const topicThumbnailId = $(this).data('topic_id');
        editTopicThumbnail(topicThumbnailId);
    });

    function editTopicThumbnail( id ) {
        CKFinder.modal( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    const outputImg = document.getElementById(`previewTopicThumbnail${id}`);
                    outputImg.setAttribute('src', file.getUrl());
                    const thumbnailUrl = new URL(file.getUrl());
                    document.getElementById(`topicThumbnailUrl${id}`).setAttribute('value', thumbnailUrl.pathname);
                } );

                finder.on( 'file:choose:resizedImage', function( evt ) {
                } );
            }
        } );
    }
</script>
@endpush