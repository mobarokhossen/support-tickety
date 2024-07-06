<?php

namespace MobarokLab\SupportTickety\Http\Controllers;

use MobarokLab\SupportTickety\Models\SupportTicket;
use MobarokLab\SupportTickety\Models\SupportCategory;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tickets.index');
    }


    public function create()
    {
        $data['categories'] = TicketCategory::all();
        return view('tickets.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:300',
            'description' => 'required|max:2000',
            'ticket_category_id' => 'required|exists:ticket_categories,id'
        ]);

        $request['priority'] = $request->priority ?? 1;
        $request['status'] = "open";
        $request['token'] = time();

        $attachment = "";
        if ($request->hasFile('attachment')) {
            $image = $request->file('attachment');
            $filename = time().bin2hex(random_bytes(8)). '.' . $image->getClientOriginalExtension();
            $image->move('uploads/support_tickets/', $filename);
            $attachment =  $filename;
        }

        $request['image'] = $attachment;
        $request['institute_id'] = auth()->user()->institute_id;
        $request['created_by'] = auth()->user()->id;

        $inputs = $request->except('attachment');
        Ticket::create($inputs);

        return redirect()->route('business_admin.tickets.index')
            ->with('success', 'Ticket created successfully.');
    }

    public function show(Ticket $ticket)
    {
        $categories = TicketCategory::all();
        return view('tickets.show', compact('ticket','categories' ));
    }

    public function edit(Ticket $ticket)
    {
        $categories = TicketCategory::all();
        return view('tickets.edit', compact('ticket','categories' ));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'description' => 'required|max:2000',
            'status' => 'required',
        ]);

        $request['title'] = "Re: ".$ticket->title;
        $request['priority'] = $request->priority ?? 1;
        $request['token'] = time();

        $attachment = "";
        if ($request->hasFile('attachment')) {
            $image = $request->file('attachment');
            $filename = time().bin2hex(random_bytes(8)). '.' . $image->getClientOriginalExtension();
            $image->move('uploads/support_tickets/', $filename);
            $attachment =  $filename;
        }

        $request['image'] = $attachment;
        $request['ticket_category_id'] = $ticket->ticket_category_id;
        $request['institute_id'] = $ticket->institute_id;
        $request['created_by'] = auth()->user()->id;
        $request['updated_by'] = auth()->user()->id;
        $request['replied_id'] = $ticket->id;

        $inputs = $request->except('attachment');
        Ticket::create($inputs);


        $inputs = [];
        $inputs['status'] = $request->status ? $request->status : "open" ;
        $inputs['updated_by'] = auth()->user()->id;

        $ticket->update($inputs);

        return redirect()->route('business_admin.tickets.index')
            ->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return response()->json([
            'msg' => 'success'
        ], 200);
    }
}
