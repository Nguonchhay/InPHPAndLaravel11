<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostAPIController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::get();
        if ($request->has('title')) {
            $posts = Post::where('title', 'LIKE', '%' . $request->get('title') . '%')->get();
        }

        $postData = [];
        foreach ($posts as $post) {
            $postData[] = [
                'id' => $post->id,
                'title' => $post->title,
                'category' => [
                    'id' => $post->category_id,
                    'title' => $post?->category->title
                ],
                'author' => [
                    'id' => $post->author_id,
                    'name' => $post?->author->name,
                    'email' => $post?->author->email,
                ],
                'image' => !empty($post->image) ? asset('/storage/posts/' . $post->image) : '',
                'description' => $post->description,
            ];
        }

        $res = [
            'statusCode' => 200,
            'data' => $postData,
            'message' => 'Post list'
        ];
        return response()->json($res);
    }

    /**
     * Create new record from submit data
     */
    public function store(Request $request)
    {
        if (!$request->has('title')) {
            return response()->json([
                'statusCode' => 400,
                'message' => 'Title is required!'
            ]);
        }
        if (!$request->has('category_id')) {
            return response()->json([
                'statusCode' => 400,
                'message' => 'Category is required!'
            ]);
        }
        $input = $request->all();

        $post = new Post();
        $post->title = $input['title'];
        $post->category_id = $input['category_id'];
        $post->author_id = $request->user()->id;
        $post->description = $input['description'];

        $baseImage = $request->get('base_image') ?? null;
        if (!empty($baseImage)) {
            // Decode image to store as a file
        }
        
        // Handle image upload

        $post->save();

        $res = [
            'statusCode' => 200,
            'data' => [$post],
            'message' => 'Post is stored successfully'
        ];
        return response()->json($res);
    }
}
