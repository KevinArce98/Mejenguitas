<?php

namespace Mejenguitas\Http\Controllers;

use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index()
    {
    	return view('historial.index');
    }
}
