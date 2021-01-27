<?php

namespace App\Http\Controllers;

use App\ForumCategory;
use App\ForumPost;
use App\ForumTopic;
use App\Http\Requests\CreateForumCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $category = ForumCategory::all();
        $user = Auth::user();
        return view('forum.index', ['category' => $category, 'user' => $user]);
    }

    public function create()
    {
        return view('forum.category.create');
    }

    public function store(CreateForumCategoryRequest $request)
    {
        if (!$request->validated()) {
            return redirect()->back()->withInput($request->input())->withErrors($request);
        }
        $category = new ForumCategory();
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->save();
        return redirect()->route('forum.index');

    }

    public function update(CreateForumCategoryRequest $request, ForumCategory $category)
    {
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->save();
        return redirect()->route('forum.index');
    }

    public function destroy(ForumCategory $category)
    {
        $category->delete();
        return redirect()->route('forum.index');
    }
}
