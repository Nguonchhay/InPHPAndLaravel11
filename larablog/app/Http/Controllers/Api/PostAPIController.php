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
}
