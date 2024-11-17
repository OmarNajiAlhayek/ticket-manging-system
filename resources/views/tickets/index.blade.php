
<x-layout>
    <x-slot:heading>
        Tickets
    </x-slot:heading>

    @if (session('success'))
        <div id="session-message" class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            <strong class="font-bold">{{ session('success') }}</strong>
            {{-- <span class="block sm:inline">you'r age is: {{ $user->age }}</span> --}}
        </div>
    @endif
    @if (session('error'))
        <div id="session-message" class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

{{-- @dd($tickets->where('status', 'pending')->sortByDesc('created_at')) --}}
    <div class="grid grid-cols-4 gap-4">
        <!-- Pending Tickets -->
        <div>
            <h2 class="text-lg font-bold">Pending Tickets</h2>
            <x-tickets.display-by-for-each
             :tickets="$tickets->where('status', 'pending')"
             status="pending" />

        </div>

        <!-- Ongoing Tickets -->
        <div>
            <h2 class="text-lg font-bold">Ongoing Tickets</h2>
            <x-tickets.display-by-for-each
             :tickets="$tickets->where('status', 'ongoing')"
             status="ongoing" />
        </div>

        <!-- Testing Tickets -->
        <div>
            <h2 class="text-lg font-bold">Testing Tickets</h2>
            <x-tickets.display-by-for-each
             :tickets="$tickets->where('status', 'testing')"
             status="testing" />
        </div>

        <!-- Finished Tickets -->
        <div>
            <h2 class="text-lg font-bold">Finished Tickets</h2>
            <x-tickets.display-by-for-each
             :tickets="$tickets->where('status', 'finished')"
             status="finished" />
        </div>
    </div>
    {{ $tickets->links() }}




    <div class="mt-96"></div>

</x-layout>
