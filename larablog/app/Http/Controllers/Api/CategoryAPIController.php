<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryAPIController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $res = [
            'statusCode' => 200,
            'data' => $categories,
            'message' => 'Category list'
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
            ], 400);
        }
        $input = $request->all();
        $category = new Category();
        $category->title = $input['title'];
        $category->description = $input['description'];
        $category->save();

        $res = [
            'statusCode' => 200,
            'data' => [$category],
            'message' => 'Category is stored successfully'
        ];
        return response()->json($res);
    }
}
