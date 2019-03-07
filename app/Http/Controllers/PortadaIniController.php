<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class PortadaIniController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function portadaIni(Request $request)
    {
        return view('portadaini');
    }

}
