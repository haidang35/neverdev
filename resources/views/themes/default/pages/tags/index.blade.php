@extends('themes.default.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <article class="single-post post-card custom-archive no-image">
                <header class="post-header">
                    <h1 class="heading-large page-title text-center">
                        Tags
                    </h1>
                    <div class="custom-page-post-content">

                    </div>
                </header>
            </article>
        </div>
    </div>
</div>
<div class="container">
    <div class="row archive-card-wrap">
        @forelse($tags as $key => $tag)
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
            <div class="archive-card archive-card-small">
                <a href="{{ route('page.tag', [$tag->slug]) }}" class="tag-card text-center">
                    <div class="tag-image-wrap">
                        <img class="tag-image" loading="lazy"
                            src="{{ $tag->getThumbnail() }}"
                            alt="{{ $tag->name }}">
                    </div>
                    <div class="tag-info-wrap">
                        <h2 class="card-title h4"><span>{{ $tag->name }}</span></h2>
                        <div class="post-count">
                            {{ $tag->blog_count }} Posts
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @empty
        @endforelse
    </div>
</div>
@endsection