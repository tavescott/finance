<?php

namespace App\Http\Controllers;

use App\Mail\Auth\VerifyEmailMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function verifyMail()
    {
        if (auth()->user()->email_verified_at !== null){
            return back();
        }

        $user = auth()->user();
        if (empty($user->email_verification_code)){
            Mail::to(auth()->user()->email)->send(new VerifyEmailMail($this->generateCode()));
        }

        $mail = $this->hide_mail($user->email);

        return view('auth.verify', compact('mail'));
    }

    public function verifyMailPost(Request $request)
    {
        $request->validate([
            'code' => 'required|min:6|max:6|exists:users,email_verification_code'
        ],
        [
            'code.required' => 'Namba ya uthibitisho yatakiwa',
            'code.min' => 'Umekosea namba ya uthibitisho',
            'code.max' => 'Umekosea namba ya uthibitisho',
            'code.exists' => 'Namba ya uthibitisho haipo',
        ]);

        $user = auth()->user();

        $this->verifyCode($user, $request->code);

        if ($user->is_complete === 0){
            return redirect()->route('owner.preliminary.personal')->with('success', 'Hongera, barua pepe yako  imethibitishwa');
        }

        return redirect()->route('owner.businesses.index')->with('success', 'Hongera, barua pepe yako imethibitishwa');
    }

    public function verifyMailButton($email,$id)
    {
        $user = User::where('email', $email)->first();

        $this->verifyCode($user, $id);

        return redirect()->route('owner.preliminary.personal')->with('success', 'Hongera, akaunti yako imethibitishwa');
    }

    public function verifyCode($user, $code)
    {
        if ($user->email_verification_code != $code){

            return redirect('email/verify')->with('fail', 'Umekosea namba ya uthibitisho');

        }
        else{
            $user->email_verified_at = now();
            $user->is_verified = 1;
            $user->save();
        }
    }
    public function generateCode()
    {
        $code = rand(100000, 999999);
        $check = User::where('email_verification_code', $code)->first();
        if ($check == null){
            if (empty(auth()->user()->email_verified_at)){
                auth()->user()->email_verification_code = $code;
                auth()->user()->save();
            }
        }
        else{
            $code = rand(100000, 999999);
        }

        return $code;
    }

    public function hide_mail($email) {
        $mail_part = explode("@", $email);
        $mail_part[0] = substr($mail_part[0], 0, -3) . "****";
        return implode("@", $mail_part);
    }

}
