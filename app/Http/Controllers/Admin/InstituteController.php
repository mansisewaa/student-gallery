<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutes = Institute::paginate(15);
        return view('admin.institute.index', compact('institutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.institute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
           'phone' => 'nullable|regex:/^[0-9\- ]+$/|min:10|max:15'

        ]);

        try {
            Institute::create($request->all());
            return redirect()->route('admin.institute')->with('success', 'Institute created successfully');
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
        $institute = Institute::where('id',$id)->first();
        return view('admin.institute.edit', compact('institute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
           'phone' => 'nullable|regex:/^[0-9\- ]+$/|min:10|max:15'

        ]);

        try {
            $institute = Institute::where('id', $id)->first();
            $institute ->update($request->all());
            return redirect()->route('admin.institute')->with('success', 'Institute Updated successfully');
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
            Institute::where('id', $id)->delete();
            return redirect()->route('admin.institute')->with('success', 'Institute Deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
