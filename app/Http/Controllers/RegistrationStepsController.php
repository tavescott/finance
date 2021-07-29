<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Plan;
use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class RegistrationStepsController extends Controller
{

    public function clear(Request $request)
    {
        $request->session()->forget('business');

        return back();
    }

    public function stepOne(Request $request)
    {
        $plans = Plan::all();
        $categories = Category::all();
        if(empty($request->session()->get('business'))){
            $business = new Business();
            $request->session()->put('business', $business);
        }
        else{
            $business = $request->session()->get('business');
        }
        $business = $request->session()->get('business');
        return view('auth.register.step_one', compact('business', 'plans', 'categories'));

    }

    public function stepOnePlan(Request $request, $plan)
    {
        $plans = Plan::all();
        $categories = Category::all();

        if(empty($request->session()->get('business'))){
            $business = new Business();
            $business->fill([
                'plan_id' => $plan
            ]);
            $request->session()->put('business', $business);
        }
        else{
            $business = $request->session()->get('business');
        }

        return view('auth.register.step_one', compact('business', 'plans', 'categories'));

    }

    public function stepOnePost(Request $request)
    {
        $validatedData =  $request->validate([
            'first_name' => 'required',
            'middle_name' => '',
            'last_name' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'p_ward_region' => 'required',
            'p_id_type' => 'required',
            'p_id_no' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => ''
        ],
            [
                'first_name.required' => 'Jina La Kwanza latakiwa',
                'last_name.required' => 'Jina La Mwisho latakiwa',
                'gender.required' => 'Chagua Jinsia',
                'birth_date.required' => 'Tarehe ya kuzaliwa yatakiwa',
                'phone_number.required' => 'Ingiza namba ya simu',
                'p_ward_region.required' => 'Chagua Kata na mkoa unapoishi',
                'email.required' => 'Ingiza barua pepe',
                'email.email' => 'Ingiza barua pepe sahihi',
                'p_id_type.required' => 'Chagua aina ya kitambulisho',
                'p_id_no.required' => 'Ingiza namba ya kitambulisho',
                'password.required' => 'Ingiza neno la siri',
                'password.confirmed' => 'Neno la siri halifanani',
                'password.min' => 'Neno la siri fupi',
            ]);


        $business = $request->session()->get('business');
        $business->fill($validatedData);
        $request->session()->put('business', $business);

        return redirect()->route('stepTwo');
    }

    public function stepTwo(Request $request)
    {
        $business = $request->session()->get('business');
        $plans = Plan::all();
        $categories = Category::all();
        //check if session is empty(user skipped step 1)
        if (empty($business))
        {
            $request->session()->flash('fail', 'You must start at step 1');
            return view('auth.register.step_one', compact('business', 'plans', 'categories'));
        }
        else{
            return view('auth.register.step_two', compact('business', 'plans', 'categories'));
        }
    }

    public function stepTwoPost(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'product_type' => 'required',
            'plan_id' => 'required',
            'ward_region' => 'required',
            'b_id_type' => 'required',
            'b_id_no' => 'required',
        ],
            [
                'name.required' => 'Jina La biashara latakiwa',
                'category_id.required' => 'Chagua Kundi la biashara',
                'product_type.required' => 'Chagua Aina ya mauzo',
                'plan_id.required' => 'Chagua Kifurushi',
                'ward_region.required' => 'Chagua Kata na mkoa wa biashara',
                'b_id_type.required' => 'Chagua utambulisho wa biashara',
                'b_id_no.required' => 'Ingiza namba ya utambulisho',
            ]);

        $business = $request->session()->get('business');
        $business->fill($validatedData);
        $request->session()->put('business', $business);

        return redirect()->route('stepThree');
    }

    public function stepThree(Request $request)
    {

        $business = $request->session()->get('business');

        $cat = Category::find($business->category_id);

        $plan = Plan::find($business->plan_id);

        return view('auth.register.step_three', compact('business','cat', 'plan'));
    }

    public function stepThreePost(Request $request)
    {
        $request->validate([
            'details' => 'required',
            'terms' => 'required',
        ],
            [
                'details.required' => 'Tafadhali thibitisha taarifa zako',
                'terms.required' => 'Tafadhali kubaliana na vigezo na masharti',
            ]);

        $data = $request->session()->get('business');

        DB::transaction(function () use ($data) {

            $user = new User;

            $user->role_id = 2;
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();

            $owner = $user->owner()->create([
                'first_name' => $data['first_name'],
                'middle_name' => $data['middle_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'birth_date' => $data['birth_date'],
                'p_ward_region' => $data['p_ward_region'],
                'phone_number' => $data['phone_number'],
                'p_id_type' => $data['p_id_type'],
                'p_id_no' => $data['p_id_no'],
            ]);

            $owner->business()->create([
                'name' => $data->name,
                'category_id' => $data->category_id,
                'product_type' => $data->product_type,
                'plan_id' => $data->plan_id,
                'ward_region' => $data->ward_region,
                'b_id_type' => $data->b_id_type,
                'b_id_no' => $data->b_id_no,
            ]);

        });

        $request->session()->forget('business');

        return view('auth.register.complete');
    }
}
