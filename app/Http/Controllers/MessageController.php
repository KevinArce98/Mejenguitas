<?php

namespace Mejenguitas\Http\Controllers;

use Illuminate\Http\Request;
use Mejenguitas\Message;
use Alert;
use Mail;
use Mejenguitas\Events\MessageWasReceived;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('messages.index');
    }
    public function indexForUser()
    {
        $messagesUnread = Message::where(['email_receive' => auth()->user()->email, 'read' => 0])->orderBy('created_at','asc')->get();
        $messagesRead = Message::where(['email_receive' => auth()->user()->email, 'read' => 1])->orderBy('created_at','asc')->get();
        return view('messages.index', compact('messagesUnread','messagesRead'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $msg = auth()->user()->messages()->create($request->all());
        event(new MessageWasReceived($msg));
        Alert::success('Mensaje Enviado.');
       $messagesUnread = Message::where(['email_receive' => auth()->user()->email, 'read' => 0])->orderBy('created_at','asc')->get();
        $messagesRead = Message::where(['email_receive' => auth()->user()->email, 'read' => 1])->orderBy('created_at','asc')->get();
        return view('messages.index', compact('messagesUnread','messagesRead'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);
        $this->authorize('show', $message);
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function markAsRead($id, $read)
    {
        $message = Message::find($id);
        $this->authorize('show', $message);
        $message->read = 1;
        $message->save();
        return redirect()->back();
    }

    public function markAsUnRead($id, $read)
    {
        $message = Message::find($id);
        $this->authorize('show', $message);
        $message->read = 0;
        $message->save();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $this->authorize('show', $message);
        $message->delete();
        return redirect()->back();
    }
}
