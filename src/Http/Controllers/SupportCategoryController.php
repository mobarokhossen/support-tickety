<?php

namespace MobarokLab\SupportTickety\Http\Controllers;

use App\Http\Controllers\Controller;
use MobarokLab\SupportTickety\Models\SupportCategory;
use Illuminate\Http\Request;

class SupportCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supportCategory = SupportCategory::all();
        return view('support-tickety::categories.index', compact('supportCategory'));
    }

    public function create()
    {
        return view('support-tickety::categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:ticket_categories|max:300'
        ]);

        SupportCategory::create($request->all());

        return redirect()->route('ticket-categories.index')
            ->with('success', 'Ticket category created successfully.');
    }

    public function show($id)
    {
        $supportCategory = SupportCategory::findOrFail($id);
        return view('support-tickety::categories.show', compact('supportCategory'));
    }

    public function edit($id)
    {
        $supportCategory = SupportCategory::findOrFail($id);
        return view('support-tickety::categories.edit', compact('supportCategory'));
    }

    public function update(Request $request, $id)
    {
        $supportCategory = SupportCategory::findOrFail($id);
        $request->validate([
            'name' => 'required|max:300|unique:ticket_categories,name,'.$supportCategory->id
        ]);

        $supportCategory->update($request->all());

        return redirect()->route('ticket-categories.index')
            ->with('success', 'Ticket category updated successfully.');
    }

    public function destroy($id)
    {
        $supportCategory = SupportCategory::findOrFail($id);
        $supportCategory->delete();

        return response()->json([
            'msg' => 'success'
        ], 200);
    }
}
