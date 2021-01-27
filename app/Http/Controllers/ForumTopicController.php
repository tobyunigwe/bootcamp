<?php

namespace App\Http\Controllers;

use App\ForumCategory;
use App\ForumPost;
use App\ForumTopic;
use App\Http\Requests\CreateTopicRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumTopicController extends Controller
{
    public function index(ForumCategory $category)
    {
        $topics = $category->topics;
        $user= Auth::user();
        return view('forum.topic.index', ['topics' => $topics, 'category' => $category,'user'=>$user]);
    }

    public function store(CreateTopicRequest $request, $category)
    {
        if (!$request->validated()) {
            return redirect()->back()->withInput($request->input())->withErrors($request);
        }
        $topic = new ForumTopic();
        $topic->subject = $request['name'];
        $topic->topic_cat = $category;
        $topic->topic_user_id = Auth::id();
        $topic->save();
        return redirect()->back();
    }

    public function update(CreateTopicRequest $request, ForumCategory $category, ForumTopic $topic)
    {
        $topic->subject = $request['name'];
        $topic->save();
        return redirect()->route('forum.topic.index', $category);
    }

    public function destroy($category, ForumTopic $topic)
    {
        $topic->delete();
        return redirect()->route('forum.topic.index', $category);
    }
}
