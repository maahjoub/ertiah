<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $types= Type::all();
        return view('type.index', compact('types'));
    }

    public function create()
    {
        return view('type.create');
    }

    public function store(Request $request)
    {

        $type = new Type();
        $type->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $type->save();
        return redirect()->route('type.index');
    }

    public function edit(Type $type)
    {
        return view('type.edit', compact('type'));
    }

    public function update(Request $request , Type $type)
    {
        $type->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $type->save();
        return redirect()->route('type.index');
    }

    public function destroy(Type $type)
    {
        if( Auth::guard('web'))
        {
            $type->delete();
        }else {
            return abort(409);
        }
        return redirect()->route('type.index');
    }
}
