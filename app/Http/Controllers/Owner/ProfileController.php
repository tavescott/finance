<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Models\Owner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index()
    {
        return view('owner.profile.index');
    }

    public function edit($id)
    {
        if (auth()->user()->owner->id != $id){
            abort(403);
        }

        $owner = Owner::find($id);
        return view('owner.profile.edit', compact('owner'));


    }

    public function update(StoreProfileRequest $request, $id)
    {
        $owner = Owner::find($id);

        $user = auth()->user();

        $data = $request->validated();

        $owner->first_name = $data['first_name'];
        $owner->middle_name = $data['middle_name'];
        $owner->last_name = $data['last_name'];
        $owner->gender = $data['gender'];
        $owner->birth_date = Carbon::make($data['birth_date']);
        $owner->ward_region = $data['ward_region'];

        $user->email = $data['email'];
        $user->phone = $data['phone'];

        DB::transaction(function () use ($owner, $user) {
            $user->save();
            $owner->save();
        });

        return redirect()->route('owner.profile.index')->with('success', 'Taarifa za akaunti yako zimehifadhiwa');


    }


    public function destroy(Owner $owner)
    {
        //
    }
}
