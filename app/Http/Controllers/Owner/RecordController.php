<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    public function index()
    {
        $records = Record::where('business_id', $this->business()->id)->paginate(7);

        return view('owner.totals.records.index', compact('records'));
    }


    public function create()
    {
        return view('owner.totals.records.create');
    }


    public function store(Request $request)
    {
        $data =$request->validate([
            'date' => '',
            'sales' => 'required_without_all:purchases,expenses,debtors,creditors',
            'purchases' => 'required_without_all:sales,expenses,debtors,creditors',
            'expenses' => 'required_without_all:purchases,sales,debtors,creditors',

        ],
        [
            'sales.required_without_all' => 'Tafadhali jaza angalau rekodi moja',
            'purchases.required_without_all' => 'Tafadhali jaza angalau rekodi moja',
            'expenses.required_without_all' => 'Tafadhali jaza angalau rekodi moja',
        ]);

        $this->business()->records()->create($data);

        return redirect()->route('owner.records.index')->with('success', 'Rekodi imehifadhiwa');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }
}
