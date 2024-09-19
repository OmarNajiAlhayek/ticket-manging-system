@props([
    'ticketId' => 0,
    'class' => '',
])

<button
    type="button"
    data-ticket-id="{{ $ticketId }}"
    @class([
        $class,
    ])
    {{-- class="{{ $class }}" --}}
>
    {{ $slot }}
</button>
