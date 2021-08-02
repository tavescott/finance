<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function index()
    {
        $units = Unit::paginate(5);

        return view('admin.units.index', compact('units'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'level' => 'required'
        ],
        [
            'name.required' => 'Andika jina la kipimo',
            'level.required' => 'Chagua kiwango',
        ]);

        Unit::create($data);

        return back()->with('success', 'Kipimo kimeongezwa');
    }


    public function destroy(Unit $unit)
    {
        $unit->delete();

        return back()->with('success', 'Kipimo kimefutwa');
    }
}
