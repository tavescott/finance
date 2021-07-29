<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Owner;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function owner()
    {
        return Owner::where('user_id', auth()->id())->first();

    }

    public function business()
    {
        return session()->get('business');
    }

}
