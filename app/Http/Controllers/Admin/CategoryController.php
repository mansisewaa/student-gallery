<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::paginate(15);
        return view('admin.category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);
            return redirect()->route('admin.category')->with('success', 'Category created successfully');
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $category = Category::where('id', $id)->first();
            $category ->update($request->all());
            return redirect()->route('admin.category')->with('success', 'Category Updated successfully');
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            category::where('id', $id)->delete();
            return redirect()->route('admin.category')->with('success', 'category Deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
