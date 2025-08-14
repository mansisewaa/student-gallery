<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = \App\Models\Product::with('category')->paginate(15);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'description' => 'nullable|string',
            'gender' => 'required|in:UNISEX,BOYS,GIRLS',
            'sku' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        try {
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'gender' => $request->gender,
                'sku' => strtoupper($request->sku),
                'price' => $request->price,
                'category_id' => $request->category_id,
                'is_active' => true,
            ]);

            return redirect()->route('admin.product')->with('success', 'Product created successfully!');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error creating product: ' . $e->getMessage());
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
        $product = Product::where('id',$id)->first();
        $categories = \App\Models\Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'description' => 'nullable|string',
            'gender' => 'required|in:UNISEX,BOYS,GIRLS',
            'sku' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        try {
            $product = Product::where('id', $id)->first();
             $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'gender' => $request->gender,
                'sku' => strtoupper($request->sku),
                'price' => $request->price,
                'category_id' => $request->category_id,
            ]);

            return redirect()->route('admin.product')->with('success', 'Product updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error creating product: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::where('id', $id)->first();
            $product->delete();

            return redirect()->route('admin.product')->with('success', 'Product deleted successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin.product')->with('error', 'Error deleting product: ' . $th->getMessage());
        }
    }

    //change status

    public function changeStatus(Request $request, $id)
    {
       try {
             $product = Product::where('id', $id)->first();
            $product->is_active = !$product->is_active;
            $product->save();

        return redirect()->route('admin.product')->with('success', 'Product status changed successfully!');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('admin.product')->with('error', 'Error changing product status: ' . $th->getMessage());
        }
    }
}
