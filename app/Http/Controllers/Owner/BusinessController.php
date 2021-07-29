<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Plan;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        $plans = Plan::all();

        $businesses =  Business::where('owner_id', $this->owner()->id)->get();
        return view('owner.businesses.index', compact('plans', 'businesses'));
    }

    public function create()
    {
        $current_businesses = Business::where('owner_id', $this->owner()->id)->get()->count();
        if($current_businesses >= $this->owner()->plan->no_of_businesses){

            return back()->with('fail', 'Huwezi kuongeza biashara nyingine kwa sasa. Ongeza kifurushi kisha ujaribu tena');

        }
        else {
            $categories = Category::all();

           return view('owner.businesses.create', compact('categories', 'current_businesses'));
        }
    }

    public function show(Business $business)
    {
        return view('owner.businesses.show', compact('business'));
    }

    public function edit(Business $business)
    {
        if ($business->owner_id != $this->owner()->id){
            abort(403);
        }

        return view('owner.businesses.edit', compact('business'));
    }


    public function update(Request $request, Business $business)
    {

    }

    public function destroy(Business $business)
    {
        $business->delete();

        return redirect()->route('owner.businesses.index')->with('success', 'Biashara imefutwa');
    }
}
