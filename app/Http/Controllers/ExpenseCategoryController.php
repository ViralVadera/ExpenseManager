<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $categories = ExpenseCategory::all();
        return view('expanse_catagory', compact('categories'));
    }

    public function create()
    {
        return view('createexpans_catagory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ExpenseCategory::create($request->all());

        return redirect()->route('admin.expense_categories.index')
                         ->with('success', 'Expense category created successfully');
    }

    public function edit(ExpenseCategory $category)
    {
        return view('editexpense_catagory', compact('category'));
    }

    public function update(Request $request, ExpenseCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.expense_categories.index')
                         ->with('success', 'Expense category updated successfully');
    }

    public function destroy(ExpenseCategory $category)
    {
        $category->delete();

        return redirect()->route('admin.expense_categories.index')
                         ->with('success', 'Expense category deleted successfully');
    }
}