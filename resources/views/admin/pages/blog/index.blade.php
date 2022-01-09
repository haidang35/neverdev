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
                            <li>List</li>
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
                        <h4 class="card-title mb-3">Blog List</h4>
                        <div class="table-responsive">
                            <table class="table mb-0">

                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Thumbnail</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Topic</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($blogs as $key => $blog)
                                        <tr>
                                            <th scope="row">{{ $blog->id }}</th>
                                            <td>
                                                <img class="thumbnail" src="{{ $blog->getThumbnail() }}"/></td>
                                            <td>{{ $blog->translation()->title }}</td>
                                            <td>{{ $blog->translation()->author()->first()->name ?? '' }}</td>
                                            <td>{{ $blog->topic->name }}</td>
                                            <th>
                                                @if($blog->isPublished())
                                                    <a href="{{ route('admin.blog.status.toggle', [$blog->id]) }}" class="btn btn-success btn-sm" style="font-size: 20px">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>
                                                @else 
                                                    <a href="{{ route('admin.blog.status.toggle', [$blog->id]) }}" class="btn btn-danger btn-sm" style="font-size: 20px">
                                                        <i class="fas fa-toggle-off"></i>
                                                    </a>
                                                @endif
                                            </th>
                                            <td>{{ $blog->created_at }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('page.custom', [$blog->translation()->slug]) }}" target="_blank" class="btn btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.blog.edit', ['id' => $blog->id]) }}" class="btn btn-primary">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteBlog{{$blog->id}}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <div class="modal fade" id="confirmDeleteBlog{{$blog->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteBlog{{$blog->id}}Label" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmDeleteBlog{{$blog->id}}Label">Warning</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure delete blog {{ $blog->translation()->title }}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <a href="{{ route('admin.blog.delete', [$blog->id]) }}" class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Have not data</td>
                                        </tr>
                                    @endforelse
                            </table>
                        </div>
                        <div class="text-right">
                            {!! $blogs->links('vendor.pagination.bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection