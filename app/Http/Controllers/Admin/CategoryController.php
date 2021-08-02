<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'name' => 'required'
        ],
        [
            'name.required' => 'Andika jina la kundi'
        ]);

       Category::create($data);

       return back()->with('success', 'Kundi limeongezwa');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Kundi limefutwa');
    }
}
