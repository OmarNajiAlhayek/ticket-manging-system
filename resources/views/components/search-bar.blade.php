@props([
    'active' => false,
])

<form action="{{ route('tickets.index') }}" method="GET">


    <div class='{{ $active ? "max-w-md mx-auto" : "hidden" }}'>
        <div class="relative flex items-center w-full h-12 overflow-hidden bg-white border border-gray-300 rounded-lg shadow-md focus-within:shadow-lg">
            <button type="submit">
                <div class="grid w-12 h-full text-gray-500 place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </button>
            <input
                wire:model="query"
                class="w-full h-full px-2 text-sm text-gray-700 bg-gray-100 outline-none peer"
                type="text"
                id="q"
                name="q"
                placeholder="Search ticket by title" />
        </div>
        @if(!empty($tickets))
            <div class="mt-2 bg-white border border-gray-300 rounded-lg shadow-md">
                <ul>
                    @foreach($tickets as $ticket)
                        <li class="px-4 py-2 border-b border-gray-200">{{ $ticket->title }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

</form>
