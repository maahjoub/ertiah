<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class studentLoginController extends Controller
{
    public function login()
    {
        return view('auth.selection');
    }

    public function store(Request $request)
    {
        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('Students.index');
       }else {
            dd($request->all());
        }
    }
}
