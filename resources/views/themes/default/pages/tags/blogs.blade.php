@extends('themes.default.layout')
@section('content')
<div class="container">
    <div class="archive-cover">
        <div class="archive-cover-inner cover-tag flex has-image">
            <img class="cover-image lazy" loading="lazy"
                sizes="(max-width: 440px) 400px, (max-width: 640px) 600px, (max-width: 1080px) 1000px, (max-width:1280px) 1200px, 1400px"
                src="{{ $tag->getThumbnail() }}"
                alt="{{ $tag->name }}">
            <div class="cover-content-wrapper">
                <div class="tag-info-wrap text-center">
                    <h1 class="tag-name">{{ $tag->name }}</h1>
                    <div class="tag-post-count">
                        {{ $tag->blog_count }} Posts
                    </div>
                    <div class="tag-description">
                        {{ $tag->desc }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row js-post-list-wrap post-list-wrap">
        @forelse($tag->blog as $key => $blog)
        <div class="col-lg-4 col-md-6 col-sm-6 js-post-card-wrap">
            <article class="post-card flex">
                <a href="#"
                    class="post-img-wrap">
                    <img loading="lazy" 
                        sizes="(max-width:432px) 400px, (min-width:945px) and (max-width:992px) 600px, (max-width:1420px) 400px, 600px"
                        src="{{ $blog->getThumbnail() }}"
                        alt="{{ $blog->translation()->title }}">
                </a>
                <div class="post-info-wrap">
                    <div class="tag-wrap">
                        <a href="index.html" style="--c-theme:#9D6805;">{{ $blog->topic->name }}</a>
                    </div>
                    <h2 class="h3 post-title">
                        <a
                            href="#">
                            {{ $blog->translation()->title }}
                        </a>
                    </h2>
                    <div class="post-excerpt">
                        {!! $blog->translation()->body !!}
                    </div>
                    <div class="post-meta-wrap flex">
                        <div class="author-avatar-wrap">
                            <a href="../../author/surabhi/index.html" class="author-image">
                                <img src="../../content/images/size/w150/2021/09/suravi.jpg" loading="lazy"
                                    alt="Surabhi Gupta">
                            </a>
                        </div>
                        <div class="meta-info">
                            <div class="author-names">

                                <a href="../../author/surabhi/index.html">{{ $blog->translation()->author->name }}</a>
                            </div>
                            <div class="date-time">
                                <time class="post-date" datetime="2021-04-24">{{ $blog->created_at->format('D j, Y') }}</time>
                                <span class="read-time">3 min read</span>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        @empty
        
        @endforelse
        
    </div>
</div>
<div class="container">
    <div class="pagination-wrap text-center" id="pagination-wrap">
        <button class="btn btn-lg" id="load-more"><span>Show more posts</span></button>
    </div>
</div>
@endsection