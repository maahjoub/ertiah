<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {

        $category = new Category();
        $category->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $category->save();
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request , Category $category)
    {
        $category->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $category->save();
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
       if( Auth::guard('web'))
       {
           $category->delete();
       }else {
           return abort(409);
       }
        return redirect()->route('category.index');
    }
}
