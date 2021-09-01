<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Purchase;
use App\Models\Record;
use App\Models\Sale;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
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
        if ($business->record_type === 'Each'){
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
        }
        else{
            $sales = Record::where('business_id', $business->id)
                ->whereDate('created_at', $date)
                ->orWhereDate('date', $date)
                ->get();

            $totalCashSales = $sales->sum('sales');

            $purchases = Record::where('business_id', $business->id)
                ->whereDate('created_at', $date)
                ->orWhereDate('date', $date)
                ->get();

            $totalCashPurchases = $purchases->sum('purchases');

            $expenses = Record::where('business_id', $business->id)
                ->whereDate('created_at', $date)
                ->orWhereDate('date', $date)
                ->get();

            $totalCashExpenses = $expenses->sum('expenses');
        }


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

        $date_formated = date('d/m/Y', strtotime($date));

        return $this->findState($totalCashSales, $totalCashPurchases, $totalCashExpenses, $date_formated);


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

    public function intervalReport(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
            'to_date' => 'required',
        ],
        [
            'from_date.required' => 'Chagua tarehe ya mwanzo',
            'to_date.required' => 'Chagua tarehe ya mwanzo'
        ]);
        $business = $this->business();


        $sales = Sale::where('business_id', $business->id)
            ->whereBetween('created_at', [$request->from_date, $request->to_date])
            ->orWhereBetween('date', [$request->from_date, $request->to_date])
            ->get();

        $totalCashSales = $sales->sum('cash_amount');

        $purchases = Purchase::where('business_id', $business->id)
            ->whereBetween('created_at', [$request->from_date, $request->to_date])
            ->orWhereBetween('date', [$request->from_date, $request->to_date])
            ->get();

        $totalCashPurchases = $purchases->sum('cash_amount');

        $expenses = Expense::where('business_id', $business->id)
            ->whereBetween('created_at', [$request->from_date, $request->to_date])
            ->orWhereBetween('date', [$request->from_date, $request->to_date])
            ->get();

        $totalCashExpenses = $expenses->sum('amount');

        $transactions = $this->findState($totalCashSales, $totalCashPurchases, $totalCashExpenses, $request->from_date);

        return view('owner.report.create', compact('transactions'));
    }

    public function findState($totalCashSales, $totalCashPurchases, $totalCashExpenses, $date)
    {

        $business = $this->business();

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
            'date' => $date,
            'business' => $business,
            'sales' => $totalCashSales,
            'expenses' => $totalCashExpenses,
            'purchases' =>$totalCashPurchases,
            'sum' => abs($sum),
            'state' => $state
        ];

    }

    public function createPDF()
    {
        $data = User::all();
        view()->share('employee',$data);
        $pdf = PDF::loadView('pdf_view', $data);
        return $pdf->download('pdf_file.pdf');

    }


    public function show($id)
    {

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
