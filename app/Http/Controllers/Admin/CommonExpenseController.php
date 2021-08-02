<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommonExpense;
use Illuminate\Http\Request;

class CommonExpenseController extends Controller
{

    public function index()
    {
        $common_expenses = CommonExpense::latest()->paginate(5);

        return view('admin.common_expenses.index', compact('common_expenses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ],
        [
            'name.required' => 'Andika jina la matumizi'
        ]);

        CommonExpense::create($data);

        return back()->with('success', 'Matumizi yameongezwa');

    }


    public function destroy(CommonExpense $commonExpense)
    {
        $commonExpense->delete();

        return back()->with('success', 'Matumizi yamefutwa');
    }
}
