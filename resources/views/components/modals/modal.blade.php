@props([
    'ticketId' => 0
])

<div id="modal-{{ $ticketId }}" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 flex items-center justify-center hidden w-full h-full overflow-auto bg-gray-800 bg-opacity-50 modal" inert>
    {{ $slot }}
</div>
