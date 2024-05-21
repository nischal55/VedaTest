<?php

namespace App\Http\Controllers;

use App\Models\CategoryExpenses;
use Illuminate\Http\Request;

class CategoryExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryExpenses::all();
        return view('categories/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $name = new CategoryExpenses;
        $name->name = $request->name;
        $name->save();
        $notification = array(
            'message' => 'Name added successfully!',
            'alert-type' =>'success'
        );
        return back()->with($notification);
    }
    /**
     * Display the specified resource.
     */
    public function show(CategoryExpenses $categoryExpenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryExpenses $categoryExpenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryExpenses $categoryExpenses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryExpenses $categoryExpenses)
    {
        //
    }
}
