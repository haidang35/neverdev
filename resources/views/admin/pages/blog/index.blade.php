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
                                            <td>{{ $blog->created_at }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.blog.edit', ['id' => $blog->id]) }}" class="btn btn-primary">Edit</a>
                                                <a href="#" class="btn btn-danger">Delete</a>
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