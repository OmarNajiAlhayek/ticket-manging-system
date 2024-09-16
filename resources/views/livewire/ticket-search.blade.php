@props([
    'active' => false,
])
<form action="{{ route('tickets.index') }}" method="GET">
    <div class='{{ $active ? "max-w-md mx-auto" : "hidden" }}'>
        <div class="relative flex flex-col items-center w-full space-y-16">
            <div class="relative flex items-center w-full h-12 overflow-hidden bg-white border border-gray-300 rounded-lg shadow-md focus-within:shadow-lg">
                <button type="submit">
                    <div class="grid w-12 h-full text-gray-500 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </button>
                <input
                    wire:model.live="query"
                    class="w-full h-full px-2 text-sm text-gray-700 bg-gray-100 outline-none peer"
                    type="search"
                    id="q"
                    name="q"
                    autocomplete="off"
                    required
                    placeholder="Search ticket by title" />
                <button type="button" id="clear-btn" class="absolute hidden text-gray-500 right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @if(!empty($tickets) && !empty($query))
                <div class="absolute left-0 z-10 w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-md">
                    <ul>
                        @foreach($tickets as $ticket)
                            <li class="px-4 py-2 border-b border-gray-200 cursor-pointer ticket-item hover:bg-gray-100">{{ $ticket->title }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('input').addEventListener('change', () => {
            document.querySelectorAll('.ticket-item').forEach(item => {
                item.addEventListener('click', function () {
                const input = document.getElementById('q');
                input.value = this.textContent.trim();
                input.form.submit();
            });
            })

        });
    });
</script>
