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
	         'name' => 'required|string|max:255',
	         'email' => 'unique:request_admins',
	         'message' => 'required|string',
	    ]);

	    $requestAdmin = new RequestAdmin;

        $requestAdmin->user_id = $request->id;
	    $requestAdmin->name = $request->name;
	    $requestAdmin->email = $request->email;
        $requestAdmin->message = $request->message;

        $requestAdmin->save();
        Alert::success('Solicituda enviada exitosamente.');
        return redirect()->back();
    }

    public function show($user){

       $request = RequestAdmin::where('user', '=', $user)->firstOrFail();

    }

    public function update(Request $request, $email)
    {
        $requestDB = RequestAdmin::where('email', '=', $email)->firstOrFail();
        $requestDB->status = $request->status;
        $requestDB->save();

        $user = User::where('email', $email)->firstOrFail();

        DB::table('assigned_roles')->insert(
            ['user_id' => $user->id, 'role_id' => 2]
        );
        
        Alert::success('Solicituda enviada exitosamente.');
        return redirect()->back();
    }
}
