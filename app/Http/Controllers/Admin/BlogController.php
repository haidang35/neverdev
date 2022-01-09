<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index() 
    {
        $blogs = Blog::with('topic')->latest()->paginate(12);
        return view('admin.pages.blog.index', compact('blogs'));
    }

    public function create() 
    {
        $topics = Topic::all();
        return view('admin.pages.blog.create', compact('topics'));
    }

    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create([
            'status' => $request->status,
            'thumbnail' => $request->thumbnail,
            'topic_id' => $request->topic_id,
            'read_time' => $request->read_time,
        ]);
        BlogTranslation::create([
            'blog_id' => $blog->id,
            'author_id' => Auth::id() ?? null,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'locale' => Session::get('language', config('app.locale')),
            'meta_title' => $request->meta_title ?? $request->title,
            'meta_desc' => $request->meta_desc ?? $request->title,
            'meta_key' => $request->meta_key ?? $request->title,
        ]);
        return redirect()->route('admin.blog.index')->with('success', 'Create new blog success');
    }

    public function edit($id)
    {
        $topics = Topic::all();
        $locale = Session::get('language', config('app.locale'));
        $blog = Blog::with('topic')->find($id);
        $blog->translation = BlogTranslation::whereBlogId($blog->id)->whereLocale($locale)->first();
        return view('admin.pages.blog.edit', compact('blog', 'topics'));
    }

    public function update($id, UpdateBlogRequest $request) 
    {
        $blog = Blog::findOrFail($id);
        $blog->update([
            'status' => $request->status,
            'thumbnail' => $request->thumbnail,
            'topic_id' => $request->topic_id,
            'read_time' => $request->read_time,
        ]);
        $locale = Session::get('language', config('app.locale'));
        $dataUpdated = [
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title),
            'meta_title' => $request->meta_title ?? $request->title,
            'meta_desc' => $request->meta_desc ?? $request->title,
            'meta_key' => $request->meta_key ?? $request->title,
        ];
        $blogTranslation = BlogTranslation::whereBlogId($blog->id)->whereLocale($locale)->first();
        if($blogTranslation !== null) {
            $blogTranslation->update($dataUpdated);
        }else {
            $dataUpdated['author_id'] = Auth::id();
            $dataUpdated['blog_id'] = $blog->id;
            $dataUpdated['locale'] = $locale;
            $dataUpdated['slug'] = Str::slug($dataUpdated['title']);
            BlogTranslation::create($dataUpdated);
        }
        return redirect()->route('admin.blog.index')->with('success', 'Update blog successfull');
    }

    public function ckeditorUpload(Request $request) 
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";  
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function changeStatus($id)
    {
        $blog = Blog::findOrFail($id);
        $status = 1;
        if($blog->status == 1) {
            $status = 0;
        }else {
            $status = 1;
        }
        $blog->update([ 'status' => $status ]);
        return back()->withSuccess('Update status for blog '.$blog->translation()->title. ' successful !');

    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return back()->withSuccess('Blog has been deleted successful');
    }
}
