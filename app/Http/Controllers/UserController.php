<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\Rules\SimilarPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function image(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ],
        [
            'image.required' => 'Tafadhali pakia picha mpya',
            'image.image' => 'Faili ulilopakia sio muundo wa picha. Tafadhali pakia JPG/PNG',
        ]);

        $user = auth()->user();

        if ($user->image){
            File::delete(public_path('images/profile_images/'.auth()->user()->image));
        }

        $image = $request->file('image');
        $filename = auth()->user()->email . time() . "." . $image->getClientOriginalExtension();
        $location = public_path('/images/profile_images');

        $img = Image::make($image->getRealPath());
        $img->fit(300, 300);
        $img->save($location.'/'.$filename);

        $user->image = $filename;
        $user->save();

        return back()->with('success', 'Picha ya wasifu imehifadhiwa');
    }

    public function password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'password' => ['required', 'min:8','confirmed', new SimilarPassword()],
        ],
        [
            'current_password.required' => 'Ingiza neno la siri la sasa',
            'password.required' => 'Ingiza neno la siri Jipya',
            'password.min' => 'Neno la siri ni dhaifu',
            'password.confirmed' => 'Tafadhali thibitisha neno la siri',
        ]);

        $user = auth()->user();

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Hongera, Umefanikiwa kubadili neno la siri');
    }

    public function destroyImage()
    {
        if (auth()->user()->image === null){
            return back()->with('fail', 'Hauna Picha ya wasifu');
        }
        $this->deleteImage();
        auth()->user()->image = null;
        auth()->user()->save();
        return back()->with('success', 'Picha ya wasifu imefutwa');
    }

    public function deleteImage()
    {
        File::delete(public_path('images/profile_images/'.auth()->user()->image));
    }

}
