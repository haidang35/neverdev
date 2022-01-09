<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Topic;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class PageController extends Controller
{
    public function tags()
    {
        SEOTools::setTitle('NEVERDEV - Tags');
        SEOTools::setDescription('Blog for all developer, learn and grow together. Never give up on your passion');
        SEOMeta::addKeyword(['NEVERDEV', 'Learn and grow together', 'Developer', 'IT', 'Developer Blog', 'Dev', 'Blog Dev']);
        SEOTools::opengraph()->setUrl(URL::to('/'));
        SEOTools::setCanonical(URL::to('/'));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@neverdev');
        SEOTools::jsonLd()->addImage(URL::to('/assets/theme/images/logo/neverdev_dark_logo.png'));
        $tags = Topic::withCount(['blog' => function($query) {
            return $query->publishStatus();
        }])->latest()->get();
        return view('themes.default.pages.tags.index', compact('tags'));
    }

    public function tagBlogs($slug)
    {
        $tag = Topic::withCount(['blog' => function($query) {
            return $query->publishStatus();
        }])->whereSlug($slug)->first();
        if($tag == null) {
            return abort(404);
        }
        SEOTools::setTitle('NEVERDEV - '.$tag->name);
        SEOTools::setDescription('Blog for all developer, learn and grow together. Never give up on your passion');
        SEOMeta::addKeyword(['NEVERDEV', 'Learn and grow together', 'Developer', 'IT', 'Developer Blog', 'Dev', 'Blog Dev']);
        SEOTools::opengraph()->setUrl(route('page.tag', [$tag->name]));
        SEOTools::setCanonical(route('page.tag', [$tag->name]));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@neverdev');
        SEOTools::jsonLd()->addImage(URL::to('/assets/theme/images/logo/neverdev_dark_logo.png'));
        $blogs = $tag->blog()->publishStatus()->paginate(6);
        return view('themes.default.pages.tags.blogs', compact('tag', 'blogs'));
    }

    public function tagBlogsLoadMore($slug)
    {
        $tag = Topic::withCount('blog')->whereSlug($slug)->first();
        $blogs = $tag->blog()->publishStatus()->with('topic')->paginate(6);
        foreach($blogs as $blog) {
            $blog['translation'] = $blog->translation();
            $blog['createdAtFormat'] = $blog->created_at->format('M d, Y');
            $blog['author'] = $blog->translation()->author;
            $blog['thumbnailUrl'] = $blog->getThumbnail();
        }
        return response()->json($blogs, 200);
    }

    public function contact()
    {
        SEOTools::setTitle('NEVERDEV - Contact');
        SEOTools::setDescription('Blog for all developer, learn and grow together. Never give up on your passion');
        SEOMeta::addKeyword(['NEVERDEV', 'Learn and grow together', 'Developer', 'IT', 'Developer Blog', 'Dev', 'Blog Dev']);
        SEOTools::opengraph()->setUrl(URL::to('/contact'));
        SEOTools::setCanonical(URL::to('/contact'));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@NEVERDEV');
        SEOTools::jsonLd()->addImage(URL::to('/assets/theme/images/logo/neverdev_dark_logo.png'));
        return view('themes.default.pages.contact.index');
    }

    public function pageCustom($slug)
    {
        $blog = Blog::with('topic')->publishStatus()->whereHas('translations', function($query) use($slug) {
            return $query->whereSlug($slug);
        })->first();
        if($blog == null) {
            return abort(404); 
        }
        SEOTools::setTitle($blog->translation()->meta_title ?? 'NEVERDEV - '.$blog->translation()->title);
        SEOTools::setDescription($blog->translation()->meta_desc ?? 'Blog for all developer, learn and grow together. Never give up on your passion');
        SEOMeta::addKeyword(explode(',', $blog->translation()->meta_key) ?? ['Neverdev', 'Learn and grow together', 'Developer', 'IT', 'Developer Blog', 'Dev', 'Blog Dev']);
        SEOTools::opengraph()->setUrl(route('page.custom', [$blog->translation()->slug]));
        SEOTools::setCanonical(route('page.custom', [$blog->translation()->slug]));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@neverdev');
        SEOTools::jsonLd()->addImage(URL::to('/').$blog->getThumbnail());
        $newerBlogId = Blog::with('topic')->publishStatus()->where('id', '<', $blog->id)->max('id');
        $newerBlog = Blog::with('topic')->find($newerBlogId);
        $olderBlogId = Blog::with('topic')->publishStatus()->where('id', '>', $blog->id)->min('id');
        $olderBlog = Blog::with('topic')->find($olderBlogId);
        $relatedBlogs = Blog::with('topic')->publishStatus()->whereNotIn('id', [$blog->id])->whereTopicId($blog->topic_id)->latest()->take(4)->get();
        return view('themes.default.pages.blog.details', compact('blog', 'newerBlog', 'olderBlog', 'relatedBlogs'));
    }

    public function generateSiteMap() 
    {
        $posts = Blog::publishStatus()->get();
        return response()->view('themes.default.pages.sitemap.index', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }

}
