<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {
        return view('owner.report.index');
    }


    public function create($date)
    {
        $business = $this->business();

        $sales = Sale::where('business_id', $business->id)
                ->whereDate('created_at', $date)
                ->orWhereDate('date', $date)
                ->get();

        $totalCashSales = $sales->sum('cash_amount');

        $purchases = Purchase::where('business_id', $business->id)
            ->whereDate('created_at', $date)
            ->orWhereDate('date', $date)
            ->get();

        $totalCashPurchases = $purchases->sum('cash_amount');

        $expenses = Expense::where('business_id', $business->id)
            ->whereDate('created_at', $date)
            ->orWhereDate('date', $date)
            ->get();

        $totalCashExpenses = $expenses->sum('amount');

        $sum = $totalCashSales - ($totalCashPurchases + $totalCashExpenses);

        if($sum > 0){
            $state = "Profit";
        }
        elseif ($sum < 0){
            $state = "Loss";
        }
        else{
            $state = "Neutral";
        }

        return $transactions = [
            'date' => date('d/m/Y', strtotime($date)),
            'business' => $business,
            'sales' => $totalCashSales,
            'expenses' => $totalCashExpenses,
            'purchases' =>$totalCashPurchases,
            'sum' => abs($sum),
            'state' => $state
        ];

    }

    public function today_report()
    {
        $transactions = $this->create(today());

        return view('owner.report.create', compact('transactions'));

    }

    public function day_report(Request $request)
    {
        $request->validate([
            'date' => 'required',
        ],
        [
            'date.required' => 'Tafadhali chagua tarehe'
        ]);

        $transactions = $this->create($request->date);

        return view('owner.report.create', compact('transactions'));

    }

    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}