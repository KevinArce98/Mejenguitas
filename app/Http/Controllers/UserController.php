<?php

namespace Mejenguitas\Http\Controllers;

use Illuminate\Http\Request;

use Mejenguitas\User;
use Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }
   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('users.edit');
    }
   
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->hasFile('avatar')) {
             $file = $request->file('avatar');
            $path = public_path() . '/img/users';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $user->avatar = "$fileName"; 
        }
       $user->name = $request->name;
       $user->phone = $request->phone;
       $user->save();
        Alert::success('Actualizado.');
       return view('users.edit');
    }

    public function destroy($id)
    {
        //
    }
}
