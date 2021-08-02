<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Admin\Plan;
use App\Models\Business;
use App\Models\Expense;
use App\Models\Item;
use App\Models\Owner;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;

class OwnerController extends Controller
{

    public function index()
    {
        if ($this->business()->record_type == "Total"){
            return view('owner.totals.index');
        }
        else {
            $items  = Item::where('business_id', $this->business()->id)->get()->count();
            $sales  = Sale::where('business_id', $this->business()->id)->get()->count();
            $purchases  = Purchase::where('business_id', $this->business()->id)->get()->count();
            $expenses  = Expense::where('business_id', $this->business()->id)->get()->count();
            return view('owner.index', compact('items', 'sales', 'purchases', 'expenses'));
        }
    }

    public function change_plan(Request $request)
    {
        $data = $request->validate([
            'plan_id' => 'required'
        ],
        [
            'plan_id.required' => 'Tafadhali chagua kifurushi kabla ya kuendelea',
        ]);

        $owner = $this->owner();
        if (Business::where('owner_id', $this->owner()->id)->get()->count() > Plan::find($data['plan_id'])->no_of_businesses){
            return back()->with('fail', 'Umechagua kifurushi chenye idadi ya biashara chache kulinganisha na biashara ulizo nazo sasa. Tafadhali, futa baadhi ya biashara kisha ujaribu tena!');
        }
        $owner->plan_id = $data['plan_id'];
        $owner->save();

        return back()->with('success', 'Hongera, umefanikiwa kubadilisha kifurushi');
    }

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }


    public function edit(Owner $owner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //
    }
}
