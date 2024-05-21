<?php

namespace App\Http\Controllers;

use App\Models\CategoryExpenses;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::all();
        $totalPrice = $expenses->sum('price');

        return view('expenses/index', compact('expenses', 'totalPrice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoryExpenses::all();
        return view('expenses/add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:category_expenses,id',
            'item_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
        $expenses = new Expense;
        $expenses->category_id = $request->input('category_id');
        $expenses->item_name = $request->input('item_name');
        $expenses->price = $request->input('price');
        $expenses->save();
        $notification = array(
            'message' => 'Expense added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('expenses.index')->with($notification);
        // return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }
    public function filterDate(Request $request)
    {
        // Validate the request
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        // Retrieve events within the date range, including the boundaries
        $expenses = Expense::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->get();
        $totalPrice = $expenses->sum('price');

        // Pass the filtered expenses to the view
        return view('expenses.index', compact('expenses', 'totalPrice'));
    }
    public function groupByFilter()
    {
        $expenses = Expense::with('category')
            ->selectRaw('category_id, SUM(price) as total_price, COUNT(*) as count')
            ->groupBy('category_id')
            ->get();
        foreach ($expenses as &$expense) {
            $expense->category_name = $expense->category->name;
        }
        // dd($expenses);
        // Calculate the overall total price
        $totalPrice = $expenses->sum('total_price');

        return view('expenses.groupby', compact('expenses', 'totalPrice'));
    }
    public function fileterDateGroupBy(Request $request)
    {
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $expenses = Expense::with('category')
            ->selectRaw('category_id, SUM(price) as total_price, COUNT(*) as count')
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->groupBy('category_id')
            ->get();

        foreach ($expenses as $expense) {
            $expense->category_name = $expense->category->name;
        }

        return view('expenses.groupby', compact('expenses', 'startDate', 'endDate'));
    }
    public function groupByMonth()
    {
        $expenses = Expense::with('category')
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month,  SUM(price) as total_price, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        return view('expenses.groupbydate', compact('expenses'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $categories = CategoryExpenses::all();
        return view('expenses.edit', compact('expense', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:category_expenses,id',
            'item_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $expense->update($validated);
        $notification = array(
            'message' => 'Expense updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('expenses.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        $notification = array(
            'message' => 'Expense deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('expenses.index')->with($notification);
    }

}
