<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketFormRequest;
use App\Ticket;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{


public function update($slug, TicketFormRequest $request)
{
$ticket = Ticket::whereSlug($slug)->firstOrFail();
$ticket->title = $request->get('title');
$ticket->content = $request->get('content');
if($request->get('status') != null) {
$ticket->status = 0;
} else {
$ticket->status = 1;
}
$ticket->save();
return redirect(action('TicketsController@edit', $ticket->slug))->with('status', 'The ticket '.$slug.' has been updated!');
}


    public function edit($slug)
{
$ticket = Ticket::whereSlug($slug)->firstOrFail();
return view('tickets.edit', compact('ticket'));
}

    public function show($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $comments = $ticket->comments()->get();
        return view('tickets.show', compact('ticket', 'comments'));
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
return view('tickets.create');
}




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketFormRequest $request)
    {
        $slug = uniqid();
$ticket = new Ticket(array(
'title' => $request->get('title'),
'content' => $request->get('content'),
'slug' => $slug));
$ticket->save();

$data = array(
    'ticket' => $slug,
    );
    Mail::send('emails.ticket', $data, function ($message) {
    $message->from('ult-blog@domain.com', 'Message Visiteur');
    $message->to('aymendotbouazizi@gmail.com')->subject('Il ya un nouveau message visiteur!');
    });


return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);
    }

    
    public function destroy($slug)
    {
    $ticket = Ticket::whereSlug($slug)->firstOrFail();
    $ticket->delete();
    return redirect('/tickets')->with('status', 'The ticket '.$slug.' has been d\
    eleted!');
    }


}
