<?php

namespace MobarokLab\SupportTickety\Http\Controllers;

use MobarokLab\SupportTickety\Models\SupportCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ticket-categories.index', );
    }

    public function create()
    {
        return view('ticket-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:ticket_categories|max:300'
        ]);

        TicketCategory::create($request->all());

        return redirect()->route('business_admin.ticket-categories.index')
            ->with('success', 'Ticket category created successfully.');
    }

    public function show(TicketCategory $ticketCategory)
    {
        return view('ticket-categories.show', compact('ticketCategory'));
    }

    public function edit(TicketCategory $ticketCategory)
    {
        return view('ticket-categories.edit', compact('ticketCategory'));
    }

    public function update(Request $request, TicketCategory $ticketCategory)
    {
        $request->validate([
            'name' => 'required|max:300|unique:ticket_categories,name,'.$ticketCategory->id
        ]);

        $ticketCategory->update($request->all());

        return redirect()->route('business_admin.ticket-categories.index')
            ->with('success', 'Ticket category updated successfully.');
    }

    public function destroy(TicketCategory $ticketCategory)
    {
        $ticketCategory->delete();

        return response()->json([
            'msg' => 'success'
        ], 200);
    }
}
