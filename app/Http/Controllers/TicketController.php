<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $q = request()->query('q');


        return view('tickets.index', [
            'tickets' => Ticket::query()
                               ->select('id', 'title', 'description', 'status', 'deadline')
                               ->when($q, function ($query) use ($q) {
                         $query->where('title', 'LIKE', "%$q%")
                               ->orWhere('description', 'LIKE', "%$q%")
                               ->orWhere('deadline', 'LIKE', "%$q%")
                               ->orWhere('id', 'LIKE', "%$q%");
                             })->orderBy('created_at', 'DESC')
                             ->get()
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request): RedirectResponse
    {

        Ticket::create($request->validated());

        return to_route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket): View
    {
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTicketRequest $request, Ticket $ticket): RedirectResponse
    {
        $ticket->update($request->validated());

        return to_route('tickets.index')->with('success', 'Ticket updated successfully.');
    }

    public function updateStatus(string $newStatus, Ticket $ticket): RedirectResponse
    {
        $ticket->status = $newStatus;
        $ticket->save();
        return to_route('tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket): RedirectResponse
    {
        $ticket->delete();

        return to_route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }
}


/*

App\Http\Controllers\TicketController::updateStatus(): Argument #1 ($ticket) must be of type App\Models\Ticket, string given, called in C:\Users\BFatt\OneDrive\Documents\GitHub\tamkeen\vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php on line 46
*/
