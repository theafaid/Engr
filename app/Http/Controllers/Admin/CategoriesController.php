<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
class CategoriesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // validate form
        $data = request()->validate([
            'name' => 'required|string|max:50|unique:categories,name'
        ]);

        $data['slug'] = str_slug($data['name']);

        // clear cache
        \Artisan::call('cache:clear');
        // create new category
        Category::create($data);
        // success
        session()->flash('success', 'Category Created Successfully');
        // redirect to categories page
        return redirect(route('categories.index'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category)
    {
        // validate form
        $data = request()->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id
        ]);
        $data['slug'] = str_slug($data['name']);

        // update categorys
        Category::whereSlug($category->slug)->update($data);
        // clear cache
        \Artisan::call('cache:clear');

        // success
        session()->flash('success', 'Category Updated Successfully');

        //redirect to categories page
        return redirect(route('categories.index'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', 'Category Deleted Successfully');
        return redirect(route('categories.index'));
    }
}
