<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class TicketSearch extends Component
{
    public $query;
    public $tickets;
    public $active;

    public function mount($active)
    {
        $this->query = '';
        $this->tickets = [];
        $this->active = $active;
    }

    public function updatedQuery()
    {
        $this->tickets = Ticket::where('title', 'like', '%' . $this->query . '%')->get();
    }

    public function render()
    {
        return view('livewire.ticket-search');
    }

}
