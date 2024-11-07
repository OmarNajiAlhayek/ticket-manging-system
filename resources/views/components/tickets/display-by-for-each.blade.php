@props([
    'tickets' => [],
    'status' => '',
])


@php
    if ($tickets && $status) {
        $statuses = \App\Models\Ticket::statuses();
        $nextStatus = $statuses[$status]['next'];
        $previousStatus = $statuses[$status]['previous'];
    }

@endphp
@forelse ($tickets as $ticket)

@php
    $deadline = \Carbon\Carbon::parse($ticket->deadline);
    $now = \Carbon\Carbon::now();
    $daysRemaining = $now->diffInDays($deadline, false); // false to get negative values if the date has passed
@endphp


<div class="p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm">
    <p class="font-bold">{{ $ticket->user->name }}</p>
    <div class="flex items-center justify-between mb-2">

        <div
    class="text-sm font-bold {{ ($daysRemaining < 0) ? 'text-gray-500'
                                  : (($daysRemaining <= 1 && $daysRemaining >= 0) ? 'text-red-500'
                                  : (($daysRemaining <= 3 && $daysRemaining > 1) ? 'text-yellow-500'
                                  : ($daysRemaining > 3 ? 'text-blue-500' : '')))
                }}"
>
    {{ $ticket->deadline }}
</div>



            {{-- <a href="{{ route('tickets.show', $ticket) }}" class="text-sm text-blue-600 hover:underline">View more...</a> --}}
            @auth()
                <x-tickets.view-ticket-modal :ticket="$ticket" />
            @endauth

        </div>
        <div class="mb-4">
            <strong class="text-lg text-gray-800">{{ $ticket->title }}</strong>
        </div>
        @auth

            <div class="flex items-center justify-between">

                <form action="{{ route('tickets.update-status', ['newStatus' => $previousStatus, 'ticket' => $ticket]) }}" method="POST" class="mr-2">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-2 py-1 text-sm text-white bg-black rounded hover:bg-gray-800">Mark as {{ $previousStatus }}</button>
                </form>
                <form action="{{ route('tickets.update-status', ['newStatus' => $nextStatus, 'ticket' => $ticket]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-2 py-1 text-sm text-black bg-white border border-black rounded hover:bg-gray-100">Mark as {{ $nextStatus }}</button>
                </form>


            </div>
        @endauth
    </div>
@empty
    <p class="text-laracasts">No tickets here.</p>
@endforelse


{{-- TODO: use the buttons component from here or old projects like pixcel-positions... or  --}}

{{-- // switch ($status) {
    //     case 'pending':
    //         $nextStatus = 'ongoing';
    //         $previousStatus = 'finished';
    //         break;

    //     case 'ongoing':
    //         $nextStatus = 'testing';
    //         $previousStatus = 'pending';
    //         break;

    //     case 'testing':
    //         $nextStatus = 'finished';
    //         $previousStatus = 'ongoing';
    //         break;

    //     case 'finishing':
    //         $nextStatus = 'pending';
    //         $previousStatus = 'testing';
    //         break;
    //     default:
    //         break;
    // } --}}
