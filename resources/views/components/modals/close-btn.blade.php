@props([
    'ticketId' => 0,
    'class' => ''
])

<button
    type="button"
    data-ticket-id="{{ $ticketId }}"
    @class([
        $class,
    ])
>
    {{ $slot }}
</button>
