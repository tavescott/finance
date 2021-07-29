<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Admin\Unit;
use App\Models\Business;
use App\Models\Item;
use App\Models\Owner;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {


    }

    public function create()
    {
        $bigUnits = Unit::where('level', 1)->get();
        $smallUnits = Unit::where('level', 2)->get();
        $miniUnits = Unit::where('level', 3)->get();

        return view('owner.items.create', compact('bigUnits', 'smallUnits', 'miniUnits'));
    }


    public function store(Request $request)
    {
        $owner = Owner::where('user_id', auth()->id())->first();
        $business = Business::where('owner_id', $owner->id)->first();
        $data = $request->validate([
            'name' => 'required|string',
            'unit_id' => 'required',
            'unit_price' => 'required|integer',
            'mini_unit_id' => 'required|integer',
            'mini_unit_price' => 'required|integer',
            'divisible_further' => 'required',
            'mini_unit_in_unit' => 'required|integer',
            'unit_quantity' => '',
            'mini_unit_quantity' => '',
        ]);

        $business->items()->create($data);

        return back()->with('success', "Bidhaa ".$data['name']." imehifadhiwa");

    }

    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
