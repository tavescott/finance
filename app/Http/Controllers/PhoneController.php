<?php

namespace App\Http\Controllers;

use App\Classes\SMS;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PhoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function verifyPhone()
    {
        if (auth()->user()->phone_verified_at !== null){
            return back();
        }

        if(auth()->user()->phone_verification_code === null){
            $code = $this->generateCode();
            $message = 'Habari! karibu katika mfumo wa Imudu. Namba yako ya uthibitisho: '. $code;
//            $sms = new SMS();
//            $sms->sendSingleSMS(auth()->user()->phone, $message);
        }

        return view('auth.phone_verify');
    }

    public function verifyPhonePost(Request $request)
    {
        $request->validate([
            'code' => 'required|min:6|max:6|exists:users,phone_verification_code'
            ],

            [
                'code.required' => 'Namba ya uthibitisho yatakiwa',
                'code.min' => 'Umekosea namba ya uthibitisho',
                'code.max' => 'Umekosea namba ya uthibitisho',
                'code.exists' => 'Umekosea namba ya uthibitisho',
            ]);

        $user = auth()->user();

        if ($user->phone_verification_code != $request->code){
            return back()->with('fail', 'Umekosea namba ya uthibitisho');
        }

        $user->phone_verified_at = now();
        $user->is_verified = 1;
        $user->save();

        return redirect()->route('owner.preliminary.personal')->with('success', 'Hongera, akaunti yako imethibitishwa');
    }

    public function generateCode()
    {
        $code = rand(100000, 999999);

        $check = User::where('phone_verification_code', $code)->first();
        if ($check == null){
            if (empty(auth()->user()->phone_verified_at)){
                auth()->user()->phone_verification_code = $code;
                auth()->user()->save();
            }
        }
        else{
            $code = rand(100000, 999999);
        }

        return $code;
    }


}
