<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    /**
     * Get list of data
     */
    public function index()
    {
        $posts = Post::paginate(50);
        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Create new record from submit data
     */
    public function store(Request $request)
    {
        if (!$request->has('title')) {
            return back()->withErrors([
                'title' => 'Title is required!'
            ]);
        }
        $input = $request->all();
        $post = new Post();
        $post->title = $input['title'];
        $post->description = $input['description'];
        $post->save();
        return redirect(route('admin.posts.index'));
    }

    /**
     * Show edit form
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit')->with('post', $post);
    }

    /**
     * Update existing record from submit data
     */
    public function update(Post $post, Request $request)
    {
        if (!$request->has('title')) {
            return back()->withErrors([
                'title' => 'Title is required!'
            ]);
        }
        $input = $request->all();
        $post->title = $input['title'];
        $post->description = $input['description'];
        $post->save();
        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove existing record
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('admin.posts.index'));
    }

    /**
     * Complete remove existing record from table
     */
    public function forceDestroy()
    {

    }
}
