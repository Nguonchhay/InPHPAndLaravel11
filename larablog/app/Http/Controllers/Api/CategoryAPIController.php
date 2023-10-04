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
}
