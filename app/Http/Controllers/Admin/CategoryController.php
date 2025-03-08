<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('settings.categories.indexCat', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.categories.createCat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newCategory = new Category();
        $newCategory->name = $data['name'];
        $newCategory->description = $data['description'];
        // dd($newCategory);
        $newCategory->save();
        return redirect()->route('admin.settings.categories.index', $newCategory->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('settings.categories.showCat', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        return view('settings.categories.editCat', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        $category->name = $data['name'];
        $category->description = $data['description'];

        $category->update();
        return redirect()->route('admin.settings.categories.index', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
