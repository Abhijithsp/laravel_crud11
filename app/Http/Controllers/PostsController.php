<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::all();
        return view('users.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        return "dasd";
        return view('users.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],

        ]);
        $validated['user_id'] = auth()->id();
        $posts = Posts::create($validated);
        if ($posts) {
            Alert::success('success', 'post created successfully');

            return to_route('posts.index');
        } else {
            Alert::error('error', 'failed to create post');
            return to_route('posts.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {

        return view('users.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $post)
    {
        if ($post->user_id !== auth()->id()) {
            Alert::error('error', 'no permission to edit this post');
            return view('users.posts.show', ['post' => $post]);
        }
        return view('users.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $post)
    {

        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required'],
        ]);
        $validated['user_id'] = auth()->id();
        $post->update($validated);

        if ($post) {
            Alert::success('success', 'post updated successfully');

            return to_route('posts.index');
        } else {
            Alert::error('error', 'failed to update post');
            return to_route('posts.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        if ($post->user_id !== auth()->id()) {
            Alert::error('error', 'no permission to delete this post');
            return view('users.posts.show', ['post' => $post]);
        }
        $post->delete();

        if ($post) {
            Alert::success('success', 'post deleted successfully');

            return to_route('posts.index');
        } else {
            Alert::error('error', 'failed to deletepost');
            return to_route('posts.index');
        }
    }
}
