<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Plan;
use App\Models\Owner;
use Illuminate\Http\Request;

class PreliminaryController extends Controller
{
    public function personalDetails()
    {
        $plans = Plan::all();

        return view('owner.preliminary.personal', compact('plans'));
    }

    public function personalPost(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'plan_id' => 'required',

        ],
        [
            'first_name.required' => 'Tafadhali andika jina la kwanza',
            'last_name.required' => 'Tafadhali andika jina la mwisho',
            'plan_id.required' => 'Tafadhali chagua kifurushi',
        ]);

        auth()->user()->owner()->create($data);

        return redirect()->route('owner.preliminary.business')->with('success', 'Taarifa binafsi zimehifadhiwa');
    }

    public function businessDetails()
    {
        $categories = Category::all();

        return view('owner.preliminary.business', compact('categories'));
    }

    public function businessPost(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'sales_type' => 'required',
            'record_type' => 'required',
            'stock_taking' => 'required_if:record_type,Each',
        ],
        [
            'name.required' => 'Jina la biashara latakiwa',
            'category_id.required' => 'Tafadhali chagua kundi la biashara',
            'sales_type.required' => 'Tafadhali chagua aina ya mauzo',
            'record_type.required' => 'Tafadhali chagua aina ya rekodi',
            'stock_taking.required_if' => 'Tafadhali chagua kama unahitaji kurekodi bidhaa zilizopo kwa sasa',
        ]);

        $owner = Owner::where('user_id', auth()->id())->first();

        $owner->business()->create($data);

        $user = auth()->user();
        $user->is_complete = 1;
        $user->save();

        return redirect()->route('owner.businesses.index');

    }


}
