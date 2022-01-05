<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Topic;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function tags()
    {
        $tags = Topic::withCount('blog')->latest()->get();
        return view('themes.default.pages.tags.index', compact('tags'));
    }

    public function tagBlogs($slug)
    {
        $tag = Topic::with('blog')->withCount('blog')->whereSlug($slug)->first();
        return view('themes.default.pages.tags.blogs', compact('tag'));
    }

    public function contact()
    {
        return view('themes.default.pages.contact.index');
    }

    public function pageCustom($slug)
    {
        $blog = Blog::with('topic')->whereHas('translations', function($query) use($slug) {
            return $query->whereSlug($slug);
        })->first();
        $newerBlog = Blog::with('topic')->find($blog->id + 1);
        $olderBlog = Blog::with('topic')->find($blog->id - 1);
        $relatedBlogs = Blog::with('topic')->whereTopicId($blog->topic_id)->latest()->take(4)->get();
        return view('themes.default.pages.blog.details', compact('blog', 'newerBlog', 'olderBlog', 'relatedBlogs'));
    }


}
