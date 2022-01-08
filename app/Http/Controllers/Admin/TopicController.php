<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Topic\StoreTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;

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
            'slug' => $request->name,
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
            'desc' => $request->desc,
            'thumbnail' => $request->thumbnail,
            'border_color' => $request->border_color,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_key' => $request->meta_key,
        ]);
        return back()->withSuccess('Update topic successful');
    }
}
