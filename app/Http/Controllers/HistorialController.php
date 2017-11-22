<?php

namespace Mejenguitas\Http\Controllers;

use Illuminate\Http\Request;

class HistorialController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin');
        //$this->middleware('roles:admin', ['except' => ['create', 'store']]);
    }

    
    public function index()
    {
    	return view('historial.index');
    }
}
