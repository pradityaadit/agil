<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(){
        return view('admin.category.create_category');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = Category::all();
       return view('admin.category.all_category', compact('data'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required',
        ]);

        Category::create($data);
        return redirect()->back()->with("alert", "Category created successfully");
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, $id)
    {
        $data = Category::where('id', $id)->first();

        return view('admin.category.category_edit', compact('data'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            "category_name" => "required"
        ]);

        $id = $request->id;
        Category::where('id', $id)->update($data);

        return redirect()->route('category.all')->with('alert', 'Your Category has been upated successfully');

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, $id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        return redirect()->route('category.all')->with('alert', 'Your Category has been deleted successfully');
        //
    }
}
