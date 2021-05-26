<?php

namespace App\Http\Controllers;

use App\Models\Admin\Unit;
use App\Models\Business;
use App\Models\Item;
use App\Models\Owner;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function business()
    {
        $owner = Owner::where('user_id', auth()->id())->first();
        return Business::where('owner_id', $owner->id)->first();

    }

    public function index()
    {

        $sales = Sale::where('business_id', $this->business()->id)->get();

        return view('owner.sales.index', compact('sales'));
    }

    public function create()
    {
        $bigUnits = Unit::where('level', 1)->get();
        $smallUnits = Unit::where('level', 2)->get();
        $miniUnits = Unit::where('level', 3)->get();
        $items = Item::where('business_id', $this->business()->id)->get();

        return view('owner.sales.create', compact('items', 'bigUnits', 'smallUnits', 'miniUnits'));
    }

    public function show_item($id)
    {
        $item  = Item::find($id);
        $unit = Unit::find($item->unit_id);
        $mini_unit = Unit::find($item->mini_unit_id);

        $data = [
            'unit' => $unit->name,
            'mini_unit' => $mini_unit->name
        ];

        return \response()->json($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
        [
            'item_id' => 'required',
            'customer' => '',
            'date' => '',
            'payment_type' => 'required',
            'unit_quantity' => 'required_without:mini_unit_quantity',
            'mini_unit_quantity' => 'required_without:unit_quantity',
            'cash_amount' => 'required_without:credit_amount',
            'credit_amount' => 'required_without:cash_amount',
        ],
        [
            'item_id.required' => 'Bidhaa inahitajika',
            'customer.required' => 'Tafadhali andika mnunuaji',
            'payment_type.required' => 'Tafadhali chagua njia ya malipo',
            'unit_quantity.required_without' => 'Tafadhali jaza idadi',
            'mini_unit_quantity.required_without' => 'Tafadhali jaza idadi',
            'cash_amount.required_without' => 'Tafadhali jaza bei',
            'credit_amount.required_without' => 'Tafadhali jaza bei',
        ]
    );
        $this->business()->sales()->create($data);

        return redirect()->route('sales.index')->with('success', 'Mauzo yamerekodiwa
      ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
