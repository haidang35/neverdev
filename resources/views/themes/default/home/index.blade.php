@extends('themes.default.layout')
@section('content')
<section class="featured-posts">
    <div class="container featured-post-layout-one">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h4 section-title">Newest Blogs</h2>
            </div>
            <div class="col-xl-7 col-lg-6">
                <article class="post-card flex">
                    <a href="{{ route('page.custom', [$newestBlog->translation()->slug]) }}" class="post-img-wrap">
                        <img loading="lazy" srcset="{{ $newestBlog->getThumbnail() }}"
                            sizes="(max-width: 340px) 300px, (max-width:640px) 600px, (max-width: 991px) 1200px, (min-width: 992px) and (max-width: 1199px) 600px, 1200px"
                            src="{{ $newestBlog->getThumbnail() }}" alt="{{ $newestBlog->translation()->title }}">
                    </a>
                    <div class="post-info-wrap">
                        <div class="tag-wrap">
                            <a href="{{ URL( $newestBlog->translation()->slug ) }}">{{ $newestBlog->topic->name }}</a>
                        </div>
                        <h2 class="post-title"><a href="{{ route('page.custom', [$newestBlog->translation()->slug]) }}">
                                {{ $newestBlog->translation()->title }}</a>
                        </h2>
                        <div class="post-excerpt">
                            {!! $newestBlog->translation()->body !!}
                        </div>
                        <div class="post-meta-wrap flex">
                            <div class="author-avatar-wrap">
                                <a href="{{ route('page.custom', [$newestBlog->translation()->slug]) }}"
                                    class="author-image">
                                    <img src="https://www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png"
                                        loading="lazy" alt="{{ $newestBlog->translation()->author->name }}">
                                </a>
                            </div>
                            <div class="meta-info">
                                <div class="author-names">

                                    <a href="author/biswajit/index.html">{{ $newestBlog->translation()->author->name
                                        }}</a>
                                </div>
                                <div class="date-time">
                                    <time class="post-date" datetime="2021-05-02">{{ $newestBlog->created_at->format('F
                                        j, Y') }}</time>
                                    <span class="read-time">3 min read</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-xl-5 col-lg-6 small-posts-wrap">
                @forelse($rightSideBlogs as $key => $blog)
                <article class="post-card post-small flex">
                    <a href="{{ $blog->translation()->slug }}" class="post-img-wrap">
                        <img loading="lazy" src="{{ $blog->getThumbnail() }}" alt="{{ $blog->translation()->title }}">
                    </a>
                    <div class="post-info-wrap">
                        <div class="tag-wrap">
                            <a href="{{ URL($blog->topic->slug) }}">{{ $blog->topic->name }}</a>
                        </div>
                        <h2 class="h4 post-title"><a href="{{ $blog->translation()->slug }}">
                                {{ $blog->translation()->title }}</a>
                        </h2>
                    </div>
                </article>
                @empty
                <article class="post-card post-small flex">
                    <a href="#" class="post-img-wrap">
                        <img loading="lazy" src="assets/theme/images/size/w600/2021/09/image-11.jpg"
                            alt="The mind and body are not separate. what affects one, affects the other">
                    </a>
                    <div class="post-info-wrap">
                        <div class="tag-wrap">
                            <a href="#">Health</a>
                        </div>
                        <h2 class="h4 post-title"><a href="#">The
                                mind and body are not separate. what affects one, affects the other</a></h2>
                    </div>
                </article>
                @endforelse
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row js-post-list-wrap post-list-wrap " id="below-blogs">
        <div class="col-lg-12">
            <h2 class="h4 section-title">Most recent posts</h2>
        </div>
        @forelse($belowSideBlogs as $key => $blog)
        <div class="col-lg-4 col-md-6 col-sm-6 js-post-card-wrap">
            <article class="post-card flex">
                <a href="{{ URL($blog->translation()->slug) }}" class="post-img-wrap">
                    <img loading="lazy" srcset="{{ $blog->getThumbnail() }}"
                        sizes="(max-width:432px) 400px, (min-width:945px) and (max-width:992px) 600px, (max-width:1420px) 400px, 600px"
                        src="{{ $blog->getThumbnail() }}" alt="{{ $blog->translation()->title }}">
                </a>
                <div class="post-info-wrap">
                    <div class="tag-wrap">
                        <a href="{{ $blog->topic->slug }}">{{ $blog->topic->name }}</a>
                    </div>
                    <h2 class="h3 post-title"><a href="{{ URL($blog->translation()->slug) }}">
                            {{ $blog->translation()->title }}</a>
                    </h2>
                    <div class="post-excerpt">
                        {!! $blog->translation()->body !!}
                    </div>
                    <div class="post-meta-wrap flex">
                        <div class="author-avatar-wrap">
                            <a href="#" class="author-image">
                                <img src="https://www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png"
                                    loading="lazy" alt="{{ $blog->translation()->author->name }}">
                            </a>
                        </div>
                        <div class="meta-info">
                            <div class="author-names">
                                <a href="#">{{ $blog->translation()->author->name }}</a>
                            </div>
                            <div class="date-time">
                                <time class="post-date" datetime="{{ $blog->created_at->format('Y-m-d') }}">{{
                                    $blog->created_at->format('D j, Y') }}</time>
                                <span class="read-time">4 min read</span>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        @empty
        @endforelse
    </div>
    <div class="container">
        <div class="pagination-wrap text-center" id="pagination-wrap">
            <button class="btn btn-lg" id="load-more-btn"><span>Show more posts</span></button>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    let loadMorePageDefault = 1;
    $('#load-more-btn').click(function(e) {
        e.preventDefault();
        loadMorePageDefault++;
        const url = '/load-more?page=' + loadMorePageDefault; 
        $.ajax({
            type: "GET",
            url,
            data: {},
            beforeSend: function() {
                $('#load-more-btn').html(`<i class="fa fa-cog fa-spin loading-icon"></i>`);
            },
            success: function (response) {
                $('#load-more-btn').html('<span>Show more posts</span>');
                const blogs = response.data;
                if(blogs.length == 0) {
                    $('#load-more-btn').html(`No more posts`);
                }else {
                    blogs.forEach((blog) => {
                    $('#below-blogs').append(`
                    <div class="col-lg-4 col-md-6 col-sm-6 js-post-card-wrap" id="below-blogs">
                        <article class="post-card flex">
                            <a href="/${blog.translation.slug}" class="post-img-wrap">
                                <img loading="lazy" srcset="${blog.thumbnail}"
                                    sizes="(max-width:432px) 400px, (min-width:945px) and (max-width:992px) 600px, (max-width:1420px) 400px, 600px"
                                    src="${blog.thumbnail}"
                                    alt="${blog.translation.title}">
                            </a>
                            <div class="post-info-wrap">
                                <div class="tag-wrap">
                                    <a href="${blog.translation.slug}">${blog.topic.name}</a>
                                </div>
                                <h2 class="h3 post-title"><a
                                        href="/${blog.translation.slug}">
                                        ${blog.translation.title}</a>
                                </h2>
                                <div class="post-excerpt">
                                   ${blog.translation.body}
                                </div>
                                <div class="post-meta-wrap flex">
                                    <div class="author-avatar-wrap">
                                        <a href="#" class="author-image">
                                            <img src="https://www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png" loading="lazy"
                                                alt="${blog.author.name}">
                                        </a>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author-names">
                                            <a href="#">${blog.author.name}</a>
                                        </div>
                                        <div class="date-time">
                                            <time class="post-date" datetime="${blog.created_at_format}">${blog.created_at_format}</time>
                                            <span class="read-time">4 min read</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    `);
                });
                }
               
            }
        });
    });
</script>
@endpush