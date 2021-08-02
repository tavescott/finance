<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Admin\Unit;
use App\Models\Business;
use App\Models\Item;
use App\Models\Owner;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{


    public function index(Request $request)
    {

        $purchases = Purchase::where('business_id', $this->business()->id)
                    ->whereDate('created_at', today())
                    ->get();
        return view('owner.purchases.index', compact('purchases'));
    }


    public function create()
    {
        $bigUnits = Unit::where('level', 1)->get();
        $smallUnits = Unit::where('level', 2)->get();
        $miniUnits = Unit::where('level', 3)->get();
        $micro_units = Unit::where('level', 3)->get();
        $items = Item::where('business_id', $this->business()->id)->get();

        return view('owner.purchases.create', compact('items', 'bigUnits', 'smallUnits', 'miniUnits', 'micro_units'));
    }

    public function show_item($id)
    {
        $item  = Item::find($id);
        $unit = Unit::find($item->unit_id);
        $mini_unit = Unit::find($item->mini_unit_id);

        $data = [
            'unit' => $unit->name,
            'mini_unit' => $mini_unit->name,
            'divisible_further' => $item->divisible_further
        ];

        return \response()->json($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'item_id' => 'required',
                'date' => '',
                'supplier' => 'required',
                'unit_quantity' => 'required_without:mini_unit_quantity',
                'mini_unit_quantity' => 'required_without:unit_quantity',
                'cash_amount' => 'required',
            ],
            [
                'item_id.required' => 'Bidhaa inahitajika',
                'supplier.required' => 'Tafadhali andika muuzaji',
                'unit_quantity.required_without' => 'Tafadhali jaza idadi',
                'mini_unit_quantity.required_without' => 'Tafadhali jaza idadi',
                'cash_amount' => 'Tafadhali jaza bei',
            ]
        );
        $this->business()->purchases()->create($data);

        return redirect()->route('owner.purchases.index')->with('success', 'Manunuzi yamerekodiwa
      ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
