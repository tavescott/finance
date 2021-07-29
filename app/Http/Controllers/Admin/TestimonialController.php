<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Owner\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }


    public function update(Request $request, Testimonial $testimonial)
    {
        if($testimonial->approved == 1){
            $testimonial->approved = 0 ;
        }
        else{
            $testimonial->approved = 1;
        }
        $testimonial->save();

        return redirect()->route('admin.testimonials.show', $testimonial->id)->with('success', 'Shuhuda imebadiishwa hali');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
