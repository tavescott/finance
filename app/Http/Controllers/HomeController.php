<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;

class HomeController extends Controller
{

    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    public function redirects(Request $request)
    {
        if (\auth()->user()->role_id == 1){

            return redirect()->route('admin.index');
        }
        else{
            if (empty(auth()->user()->email_verified_at)){
                return redirect('/email/verify');
            }

            else{

                if (\auth()->user()->is_complete == 0 && \auth()->user()->role_id != 1){
                    return redirect()->route('owner.preliminary.personal');
                }

                else{

                    if (auth()->user()->role->name == 'Owner'){
                        return redirect()->route('owner.businesses.index');
                    }

                    elseif (auth()->user()->role->name == 'Helper'){
                        return redirect('/helper');
                    }

                    else{
                        return $this->index();
                    }

                }
            }
        }

    }

//    public function setCookie(Request $request, $id)
//    {
//        $minutes = 120;
//        $business = new Response();
//        $business->withCookie(cookie('business_id', $id, $minutes));
//
//        $value = $request->cookie('business_id');
//        dd($value);
//    }

    public function setCookie(Request $request, $id) {
        $business = Business::find($id);

        $request->session()->put('business', $business);

        return redirect('/owner');
    }



}
