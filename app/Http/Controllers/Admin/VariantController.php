<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Models\VariantOption;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = \App\Models\Product::all();
        $variant_options = \App\Models\VariantOption::all();
        $product_variants = \App\Models\ProductVariant::paginate(15);
        return view('admin.variant.index', compact('products', 'product_variants','variant_options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $variants = \App\Models\VariantOption::paginate(15);
        return view('admin.variant.create',compact('categories','variants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'type' => 'required',
        ]);

        try {
            VariantOption::create([
                'label' => $request->label,
                'type' => $request->type,
            ]);
            return redirect()->back()->with('success', 'Variant created successfully');
        } catch (\Exception $e) {
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
        $variant = VariantOption::where('id', $id)->first();
        return view('admin.variant.edit', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'label' => 'required',
            'type' => 'required',
        ]);

        try {
            $variant_option = VariantOption::where('id',$id)->first();
            $variant_option->update([
                'label' => $request->label,
                'type' => $request->type,
            ]);
            return redirect()->route('admin.variant')->with('success', 'Variant Update successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    // Product Variant Store

    public function productVariantStore(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'variant_option_id' => 'required',
        ]);

        try {
            \App\Models\ProductVariant::create([
                'product_id' => $request->product_id,
                'variant_option_id' => $request->variant_option_id,
            ]);
            return redirect()->back()->with('success', 'Product Variant created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function productVariantEdit($id)
    {
        try {
            $product_variant = ProductVariant::where('id', $id)->first();
            $products = \App\Models\Product::all();
            $variant_options = \App\Models\VariantOption::all();
            return view('admin.variant.edit_product_variant', compact('product_variant', 'products', 'variant_options'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function productVariantUpdate(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'variant_option_id' => 'required',
        ]);

        try {
            $product_variant = ProductVariant::where('id', $id)->first();
            $product_variant->update([
                'product_id' => $request->product_id,
                'variant_option_id' => $request->variant_option_id,
            ]);
            return redirect()->route('admin.variant')->with('success', 'Product Variant Update successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function productVariantDestroy($id)
    {
        try {
            $product_variant = ProductVariant::where('id', $id)->first();
            $product_variant->delete();
            return redirect()->back()->with('success', 'Product Variant Deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
