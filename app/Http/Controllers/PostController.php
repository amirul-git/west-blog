<?php

namespace App\Http\Controllers;

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
        $timeTravelPost = Post::where('category_id', 4)->whereYear('created_at', 2023)->limit(1)->first();

        $posts = Post::where('category_id', $category)->orderBy('created_at', $sortBy)->get();

        $states = [
            'sort' => $sortBy,
            'category' => $category
        ];

        return view('post.index', compact('posts', 'states', 'timeTravelPost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
