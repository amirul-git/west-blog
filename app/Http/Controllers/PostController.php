<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortBy = $request->query('sort') ? $request->query('sort') : 'desc';
        $category = $request->query('category') ? $request->query('category') : '1';

        $timeTravelPosts = Post::where('category_id', 4)->get();
        $timeTravelQuery = null;
        if ($request->query('time-travel')) {
            $timeTravelQuery = $request->query('time-travel');
        } else if (Post::where('category_id', 4)->latest()->first()) {
            $timeTravelQuery = Post::where('category_id', 4)->latest()->first()->id;
        }

        $selectedTimeTravelPost = $timeTravelQuery ? Post::find($timeTravelQuery) : null;

        $posts = Post::where('category_id', $category)->orderBy('created_at', $sortBy)->get();

        $states = [
            'sort' => $sortBy,
            'category' => $category
        ];

        return view('post.index', compact('posts', 'states', 'timeTravelPosts', 'selectedTimeTravelPost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attr = $request->only(['title', 'text']);
        $post = new Post();
        $post->fill($attr);
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $attr = $request->only(['title', 'text']);
        $post->fill($attr);
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
