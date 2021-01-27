<?php

namespace App\Http\Controllers;

use App\ForumCategory;
use App\ForumPost;
use App\ForumTopic;
use App\Http\Requests\CreatePostRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumTopicPostController extends Controller
{
    public function index(ForumCategory $category, ForumTopic $topic)
    {
        $posts = $topic->posts()->orderBy('updated_at', 'DESC')->get();
        return view('forum.post.index', compact('category', 'topic', 'posts'));
    }

    public function store(CreatePostRequest $request, $category, $topic)
    {
        if (!$request->validated()) {
            return redirect()->back()->withInput($request->input())->withErrors($request);
        }
        $post = new ForumPost();
        $post->subject = $request['subject'];
        $post->message = $request['message'];
        $post->topic_id = $topic;
        $post->topic_cat = $category;
        $post->user_id = Auth::id();
        $post->save();
        return redirect()->route('forum.topic.post.index',[$category,$topic]);
    }

    public function edit(ForumCategory $category, ForumTopic $topic, ForumPost $post)
    {
        return view('forum.post.edit', ['category' => $category, 'topic' => $topic, 'post' => $post]);
    }


    public function update(CreatePostRequest $request, $category, $topic, ForumPost $post)
    {
        if (!$request->validated()) {
            return redirect()->back()->withInput($request->input())->withErrors($request);
        }
        $post->subject = $request['subject'];
        $post->message = $request['message'];
        $post->topic_id = $topic;
        $post->user_id = Auth::id();
        $post->save();
        return redirect()->route('forum.topic.post.index', [$category, $topic]);
    }

    public function destroy($category, $topic, ForumPost $post)
    {
        if (Auth::id() == $post->user_id || Auth::user()->hasRole('admin|teacher')) {
            $post->delete();
            return redirect()->route('forum.topic.post.index', [$category, $topic]);
        } else {
            return view('errors.403');
        }
    }
}
