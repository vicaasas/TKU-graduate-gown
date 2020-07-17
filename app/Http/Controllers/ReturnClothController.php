<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnClothController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.return');
    }

    public function post(Request $request)
    {
        return $request->all();

        // return view('admin.return');
    }
}
