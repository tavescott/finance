<?php

namespace App\Http\Controllers;

use App\Models\Admin\Unit;
use App\Models\Business;
use App\Models\CommonExpense;
use App\Models\Expense;
use App\Models\Item;
use App\Models\Owner;
use App\Models\Sale;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function business()
    {
        $owner = Owner::where('user_id', auth()->id())->first();
        return Business::where('owner_id', $owner->id)->first();

    }

    public function index()
    {

        $expenses = Expense::where('business_id', $this->business()->id)->get();

        return view('owner.expenses.index', compact('expenses'));
    }

    public function create()
    {

        $units = Unit::where('level', 10)->get();
        $common_expenses = CommonExpense::all();

        return view('owner.expenses.create', compact('common_expenses', 'units'));
    }


    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'common_expense_id' => '',
                'date' => '',
                'name' => 'required_without:common_expense_id',
                'amount' => 'required|integer|min:1',
                'unit_id' => 'required',
                'multiplier' => 'required',
                'number_of_days' => '',
                'description' => '',
            ],
            [
                'name.required_without' => 'Tafadhali chagua matumizi au andika jina la matumizi',
                'amount.required' => 'Tafadhali andika kiasi',
                'amount.integer' => 'Kiasi sio sahihi. Andika namba',
                'amount.min' => 'Kiasi sio sahihi. Kiasi ni namba chanya',
                'unit_id.required' => 'Chagua kipindi cha matumizi ',
                'multiplier.required' => 'Andika marudio ya kipindi',
            ]
        );

        $this->business()->expenses()->create($data);

        return redirect()->route('expenses.index')->with('success', 'Matumizi yamehifadhiwa
      ');
    }
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
