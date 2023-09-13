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
        return view('categories.index');
    }

    /**
     * Show create form
     */
    public function create()
    {

    }

    /**
     * Create new record from submit data
     */
    public function store()
    {

    }

    /**
     * Display detail information
     */
    public function show()
    {

    }

    /**
     * Show edit form
     */
    public function edit()
    {

    }

    /**
     * Update existing record from submit data
     */
    public function update()
    {

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
