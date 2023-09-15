<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    /**
     * Get list of data
     */
    public function index()
    {
        $categories = Category::get();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('categories.create');
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
        $category = new Category();
        $category->title = $input['title'];
        $category->description = $input['description'];
        $category->save();
        return redirect(route('categories.index'));
    }

    /**
     * Show edit form
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update existing record from submit data
     */
    public function update(Category $category, Request $request)
    {
        if (!$request->has('title')) {
            return back()->withErrors([
                'title' => 'Title is required!'
            ]);
        }
        $input = $request->all();
        $category->title = $input['title'];
        $category->description = $input['description'];
        $category->save();
        return redirect(route('categories.index'));
    }

    /**
     * Remove existing record
     */
    public function destroy()
    {

    }

    /**
     * Complete remove existing record from table
     */
    public function forceDestroy()
    {

    }
}
