<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $heading }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/scroll-bar-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- @vite(['resources/js/app.js']) --}}
</head>

<body class="h-full">


    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="w-8 h-8" src="https://laracasts.com/images/logo/logo-triangle.svg"
                                 alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="flex items-baseline ml-10 space-x-4">
                                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                                <x-nav-link :href="route('tickets.index')" :active="request()->routeIs('tickets.index')">Tickets</x-nav-link>
                                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center ml-4 md:ml-6">
                            @guest
                                <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                                <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                            @endguest

                            @auth
                                    <form method="POST" action="/logout">
                                        @csrf

                                        <x-form-button>Log Out</x-form-button>
                                    </form>
                            @endauth


                        </div>
                    </div>
                    <div class="flex -mr-2 md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                                class="relative inline-flex items-center justify-center p-2 text-gray-400 bg-gray-800 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">

                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <x-nav-link href="/"
                       :active="request()->is('/')"
                       :mobile="true"
                       aria-current="page">Home</x-nav-link>
                    <x-nav-link href="{{route('tickets.index')}}"
                    :active="request()->routeIs('tickets.index')"
                    :mobile="true"
                       >Tickets</x-nav-link>
                    <x-nav-link href="/contact"
                    :active="request()->is('contact')"
                    :mobile="true"
                       >Contact</x-nav-link>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full" src="https://laracasts.com/images/lary-ai-face.svg"
                                 alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">Lary Robot</div>
                            <div class="text-sm font-medium leading-none text-gray-400">jeffrey@laracasts.com</div>
                        </div>
                        <button type="button"
                                class="relative flex-shrink-0 p-1 ml-auto text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>




        <header class="bg-white shadow">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:flex sm:justify-between">

                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    {{ $heading }}
                </h1>
                {{-- <x-search-bar :active="request()->routeIs('tickets.index')"></x-search-bar> --}}
                @livewire('ticket-search', ['active' => request()->routeIs('tickets.index')])



                <x-tickets.create-ticket-modal />


            </div>
        </header>

        <main>
            <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <x-scroll-to-top-btn />

                {{ $slot }}
            </div>




        </main>
    </div>



<script>

$(document).ready(function () {

const showModalButtons = $('.show-modal-btn');
const closeModalButtons = $('.close-modal-btn');
const modals = $('.modal');

function showModal(ticketId) {
    const modal = $(`#modal-${ticketId}`);
    modal.fadeIn(200).removeClass('hidden').removeAttr('inert').attr('aria-hidden', 'false');
    // document.querySelector(`#modal-${ticketId}`).style.display = 'flex';
    modal.css('display', 'flex');
}

showModalButtons.on('click', function () {
    const ticketId = $(this).data('ticket-id');
    showModal(ticketId);
    localStorage.setItem('previosOpendModal', JSON.stringify(ticketId));
});

closeModalButtons.on('click', function () {
    const ticketId = $(this).data('ticket-id');
    const modal = $(`#modal-${ticketId}`);
    modal.fadeOut(200, function () {
        modal.addClass('hidden').attr('inert', '').attr('aria-hidden', 'true');
    });
});

modals.on('click', function (e) {
    //  e.target.classList.contains('close-btn')
    // if ($(e.target).hasClass('close-btn'))
    //     return;
    const ticketId = e.target.id?.match(/\d+/)?.[0];

    if (! ticketId)
        return;

    const modalContent = $(`#modal-content-${ticketId}`);
    if (modalContent.length &&
        !modalContent?.[0]?.contains(e.target)) {
        $(e.target).fadeOut(200, function () {
            $(e.target).addClass('hidden').attr('inert', '').attr('aria-hidden', 'true');
        })
    }
});

flatpickr(".deadline", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
});

const sessionMessage = $('#session-message');

if (sessionMessage.length) {
    setTimeout(() => {
        sessionMessage.fadeOut(200, function () {
            $(this).remove();
        });
    }, 3000);
}

@if ($errors->any())
    showModal(JSON.parse(localStorage.getItem('previosOpendModal')))
@endif


});
</script>



</body>




<x-footer />

</html>
