<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index() 
    {
        $newestBlog = Blog::with('topic')->latest()->first();
        $rightSideBlogs = Blog::with('topic')->latest()->whereNotIn('id', [$newestBlog->id])->take(5)->get();
        $rightSideBlogIds = Blog::with('topic')->latest()->whereNotIn('id', [$newestBlog->id])->take(5)->pluck('id')->toArray();
        $rightSideBlogIds[] = $newestBlog->id;
        $belowSideBlogs = Blog::with('topic')->latest()->whereNotIn('id', $rightSideBlogIds)->take(9)->get();
        return view('themes.default.home.index', compact('newestBlog', 'rightSideBlogs', 'belowSideBlogs'));
    }

    public function indexLoadMore(Request $request)
    {
        $numberLoadMore = 9;
        if($request->has('load_more')) {
            $numberLoadMore = (int)$request->get('load_more');
        }
        $newestBlog = Blog::with('topic')->latest()->first();
        $rightSideBlogIds = Blog::with('topic')->latest()->whereNotIn('id', [$newestBlog->id])->take(5)->pluck('id')->toArray();
        $rightSideBlogIds[] = $newestBlog->id;
        $belowSideBlogs = Blog::with('topic')->latest()->whereNotIn('id', $rightSideBlogIds)->paginate(9);
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
}
