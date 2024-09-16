<x-layout>
    <x-slot:heading>
        {{ $ticket->title }}
    </x-slot:heading>

    <div class="container p-4 mx-auto">
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <div class="px-6 py-4">
                <h2 class="mb-2 text-xl font-bold">{{ $ticket->title }}</h2>
                <p class="text-base text-gray-700"><strong>Description:</strong> {{ $ticket->description }}</p>
                <p class="text-base text-gray-700"><strong>Deadline:</strong> {{ $ticket->deadline }}</p>
                <p class="text-base text-gray-700"><strong>Status:</strong> {{ $ticket->status }}</p>
            </div>
            <div class="px-6 py-4">
                <a href="{{ route('tickets.index') }}" class="px-4 py-2 font-bold text-white bg-blue-600 rounded hover:bg-blue-700">
                    Back to Tickets
                </a>
            </div>
        </div>
    </div>
</x-layout>


{{-- <p class="mt-6">
                    <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
                </p> --}}

 {{-- @can('edit', $job) --}}

    {{-- @endcan --}}
