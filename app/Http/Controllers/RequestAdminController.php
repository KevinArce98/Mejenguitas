<?php

namespace Mejenguitas\Http\Controllers;

use Illuminate\Http\Request;
use Mejenguitas\RequestAdmin;
use Illuminate\Support\Facades\DB;
use Alert;
use Mejenguitas\User;
use Mejenguitas\Role;

class RequestAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin', ['except' => ['create', 'store']]);
    }

    public function index(){
        $requests = RequestAdmin::all();
        return view('requests.index', compact('requests'));
    }
    
    public function create(){
    	return view('requests.create');
    }


    public function store(Request $request)
	{
	    $validatedData = $request->validate([
	         'message' => 'required|string',
	    ]);
        auth()->user()->request()->create($request->all());

        Alert::success('Solicituda enviada exitosamente.');
        return redirect()->back();
    }

    public function show($user){

       $request = RequestAdmin::where('user', '=', $user)->firstOrFail();

    }

    public function update(Request $request, $id)
    {
        $requestDB = RequestAdmin::where('user_id', '=', $id)->firstOrFail();
        $requestDB->status = $request->status;
        $requestDB->save();
        if ($request->status === 'C') {
            $requestDB->user->roles()->attach(2);     
        }
        
        Alert::success('Actualizado');
        return redirect()->back();
    }
}
