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
        $owner->email_2 = $data['email_2'];
        $owner->phone_2 = $data['phone_2'];
        $owner->id_type = $data['id_type'];
        $owner->id_type = $data['id_type'];
        $owner->id_number = $data['id_number'];

        $user->email = $data['email'];
        $user->phone = $data['phone'];

        if ($request->hasFile('id_document_path')){
            $filename = $data['first_name'].'-'.$data['last_name'].'-('.$data['id_type'].'-ID).'.$request->id_document_path->getClientOriginalExtension();
            $request->id_document_path->move(public_path('Images/Owners/IDs/'), $filename);
            $id_path = 'Images/Owner/IDs/'.$filename;

            $old_path = $owner->id_document_path;

            $owner->id_document_path = $id_path;

            Storage::delete($old_path);
        }

        if ($request->hasFile('image_path')){
            $filename = $data['first_name'].'-'.$data['last_name'].'-(profile_image)-'.rand(1000000, 9999999).'.'.$request->image_path->getClientOriginalExtension();
            $request->image_path->move(public_path('Images/Owners/Images/'), $filename);
            $image_path = 'Images/Owner/Images/'.$filename;

            $old_path = $owner->image_path;

            $owner->image_path = $image_path;

            Storage::delete($old_path);
        }
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
