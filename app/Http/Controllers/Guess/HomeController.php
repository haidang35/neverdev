<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Subscriber;
use App\Models\Topic;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function index() 
    {
        SEOTools::setTitle('NEVERDEV - Learn and grow together');
        SEOTools::setDescription('Blog for all developer, learn and grow together. Never give up on your passion');
        SEOMeta::addKeyword(['NEVERDEV', 'Learn and grow together', 'Developer', 'IT', 'Developer Blog', 'Dev', 'Blog Dev']);
        SEOTools::opengraph()->setUrl(URL::to('/'));
        SEOTools::setCanonical(URL::to('/'));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@neverdev');
        SEOTools::jsonLd()->addImage(URL::to('/assets/theme/images/logo/NEVERDEV_dark_logo.png'));

        $newestBlog = Blog::with('topic')->publishStatus()->latest()->first();
        if($newestBlog == null) {
            return abort(500);
        }
        $rightSideBlogs = Blog::with('topic')->publishStatus()->latest()->whereNotIn('id', [$newestBlog->id])->take(5)->get();
        $rightSideBlogIds = Blog::with('topic')->publishStatus()->latest()->whereNotIn('id', [$newestBlog->id])->take(5)->pluck('id')->toArray();
        $rightSideBlogIds[] = $newestBlog->id;
        $belowSideBlogs = Blog::with('topic')->publishStatus()->latest()->whereNotIn('id', $rightSideBlogIds)->take(9)->get();
        return view('themes.default.home.index', compact('newestBlog', 'rightSideBlogs', 'belowSideBlogs'));
    }

    public function indexLoadMore(Request $request)
    {
        $newestBlog = Blog::with('topic')->latest()->first();
        $rightSideBlogIds = Blog::with('topic')->latest()->whereNotIn('id', [$newestBlog->id])->take(5)->pluck('id')->toArray();
        $rightSideBlogIds[] = $newestBlog->id;
        $belowSideBlogs = Blog::with('topic')->publishStatus()->latest()->whereNotIn('id', $rightSideBlogIds)->paginate(9);
        foreach($belowSideBlogs as $blog) {
            $blog['translation'] = $blog->translation();
            $blog['author'] = $blog->translation()->author;
            $blog['thumbnail'] = $blog->getThumbnail();
            $blog['created_at_format'] = $blog->created_at->format('M d, Y');
        }
        return response()->json($belowSideBlogs, 200);
    }


    public function changeLanguage($lang) 
    {
        $language = config('app.locale');
        if ($lang == 'en') {
            $language = 'en';
        }
        if ($lang == 'vi') {
            $language = 'vi';
        }
        Session::put('language', $language);
        return back();
    }

    public function subscribeNews(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'email' => 'required | string | email',
        ]);
        $subscriberExist = Subscriber::whereEmail($request->input('email'))->first();
        if($subscriberExist !== null) {
            return response()->json('This email is already registered', 200);
        }
        $subscriber = Subscriber::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        return response()->json('You have successfully subscribed. Thanks', 200);
    }

    public function contact(Request $request)
    {
        SEOTools::setTitle('NEVERDEV - Learn and grow together');
        SEOTools::setDescription('Blog for all developer, learn and grow together. Never give up on your passion');
        SEOMeta::addKeyword(['NEVERDEV', 'Learn and grow together', 'Developer', 'IT', 'Developer Blog', 'Dev', 'Blog Dev']);
        SEOTools::opengraph()->setUrl(URL::to('/'));
        SEOTools::setCanonical(URL::to('/'));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@neverdev');
        SEOTools::jsonLd()->addImage(URL::to('/assets/theme/images/logo/NEVERDEV_dark_logo.png'));
        $request->validate([
            'full_name' => 'required | string',
            'email' => 'required | string | email',
            'subject' => 'required | string',
            'message' => 'required | string',
        ]);
        Contact::create([
            'full_name' => $request->get('full_name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);
        return response()->json('Success', 200);
    }

    public function searchBlog(Request $request) 
    {
        $searchValue = $request->get('searchValue');
        $blogs = Blog::searchAjax($searchValue)->publishStatus()->take(3)->latest()->get();
        foreach($blogs as $blog) {
            $blog['translation'] = $blog->translation();
            $blog['thumbnailUrl'] = $blog->getThumbnail();
        }
        return response()->json($blogs, 200);
    }
}
