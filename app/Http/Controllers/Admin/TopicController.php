<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Topic\StoreTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    public function index() 
    {
        $topics = Topic::withCount('blog')->latest()->paginate(12);
        return view('admin.pages.topic.index', compact('topics'));
    }

    public function store(StoreTopicRequest $request) 
    {
        Topic::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'desc' => $request->desc,
            'border_color' => $request->border_color,
            'thumbnail' => $request->thumbnail,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_key' => $request->meta_key,
        ]);
        return redirect()->route('admin.topic.index')->with('success', 'Create new topic successfull !');
    }

    public function update($id, StoreTopicRequest $request) 
    {
        $topic = Topic::findOrFail($id);
        $topic->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'desc' => $request->desc,
            'thumbnail' => $request->thumbnail,
            'border_color' => $request->border_color,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_key' => $request->meta_key,
        ]);
        return back()->withSuccess('Update topic successful');
    }

    public function updateStatus($id) {
        $topic = Topic::findOrFail($id);
        $status = 1;
        if($topic->status == 1) {
            $status = 0;
        }else {
            $status = 1;
        }
        $topic->update([ 'status' => $status ]);
        return back()->withSuccess('Update status for topic '.$topic->name. ' successful !');
    }
}
