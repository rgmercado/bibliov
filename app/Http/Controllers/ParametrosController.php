<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class ParametrosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('portadaIni', 'showContac', 'showEquipo');
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

    public function showContac(){

        return view('param.showcontac');
    }
    public function showEquipo(){

        return view('param.showequipo');
    }


}
