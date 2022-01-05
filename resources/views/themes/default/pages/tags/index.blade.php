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
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
            <div class="archive-card archive-card-small">
                <a href="#" class="tag-card text-center">
                    <div class="tag-image-wrap">
                        <img class="tag-image" loading="lazy"
                            srcset="https://images.unsplash.com/photo-1599424835104-23ebc5784c6b?crop&#x3D;entropy&amp;cs&#x3D;tinysrgb&amp;fit&#x3D;max&amp;fm&#x3D;jpg&amp;ixid&#x3D;MnwxMTc3M3wwfDF8c2VhcmNofDY2fHxkb29kbGV8ZW58MHx8fHwxNjMyMzI4Mzg2&amp;ixlib&#x3D;rb-1.2.1&amp;q&#x3D;80&amp;w&#x3D;2000 300w,
                                    https://images.unsplash.com/photo-1599424835104-23ebc5784c6b?crop&#x3D;entropy&amp;cs&#x3D;tinysrgb&amp;fit&#x3D;max&amp;fm&#x3D;jpg&amp;ixid&#x3D;MnwxMTc3M3wwfDF8c2VhcmNofDY2fHxkb29kbGV8ZW58MHx8fHwxNjMyMzI4Mzg2&amp;ixlib&#x3D;rb-1.2.1&amp;q&#x3D;80&amp;w&#x3D;2000 600w,"
                            sizes="(max-width: 340px) 300px, (min-width: 341px) and (max-width: 575px) 600px, (min-width: 1061px) 600px, 600px"
                            src="https://images.unsplash.com/photo-1599424835104-23ebc5784c6b?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=MnwxMTc3M3wwfDF8c2VhcmNofDY2fHxkb29kbGV8ZW58MHx8fHwxNjMyMzI4Mzg2&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=2000"
                            alt="">
                    </div>
                    <div class="tag-info-wrap">
                        <h2 class="card-title h4"><span>Inspiration</span></h2>
                        <div class="post-count">
                            7 Posts
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforelse
       
    </div>
</div>
@endsection