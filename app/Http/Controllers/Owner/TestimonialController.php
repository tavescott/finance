<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function create()
    {
        return view('owner.testimonials.create');
    }


    public function store(Request $request)
    {
        $owner = $this->owner();
        $data = $request->validate([
            'business_id' => '',
            'stars' => 'required',
            'content' => 'required'
        ]);

        $owner->testimonials()->create($data);

        return redirect()->route('owner.index')->with('success', 'Shuhuda imewasilishwa. Asante kwa maoni yako!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
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
