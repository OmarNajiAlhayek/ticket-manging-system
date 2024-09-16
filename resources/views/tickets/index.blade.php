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





    <div class="mt-96"></div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const viewMoreButtons = document.querySelectorAll('.view-more-btn');
    const closeButtons = document.querySelectorAll('.close-btn');
    const deleteButtons = document.querySelectorAll('.delete-btn');

    viewMoreButtons.forEach(button => {
        button.addEventListener('click', function () {
            const ticketId = this.getAttribute('data-ticket-id');
            const modal = document.getElementById(`modal-${ticketId}`);
            modal.classList.remove('hidden');
            modal.removeAttribute('inert');
            modal.setAttribute('aria-hidden', 'false');
        });
    });

    closeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const ticketId = this.getAttribute('data-ticket-id');
            const modal = document.getElementById(`modal-${ticketId}`);
            modal.classList.add('hidden');
            modal.setAttribute('inert', '');
            modal.setAttribute('aria-hidden', 'true');
        });
    });

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const ticketId = this.getAttribute('data-ticket-id');
            // Handle delete logic here
            alert(`Delete ticket with ID: ${ticketId}`);
        });
    });

    // Close modal when clicking outside of the modal content
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', function (event) {
            const modalContent = modal.querySelector('.modal-content');
            if (!modalContent.contains(event.target)) {
                modal.classList.add('hidden');
                modal.setAttribute('inert', '');
                modal.setAttribute('aria-hidden', 'true');
            }
        });
    });

    // Show modal if there are errors
    if (document.querySelector('.error')) {
        const errorModalId = document.querySelector('.error').closest('.modal').id;
        document.getElementById(errorModalId).classList.remove('hidden');
        document.getElementById(errorModalId).removeAttribute('inert');
        document.getElementById(errorModalId).setAttribute('aria-hidden', 'false');
    }

    flatpickr(".deadline", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
});

const sessionMessage = document.querySelector('#session-message');

if (sessionMessage) {
    setTimeout(() => {
        sessionMessage.remove();
        // when hover stop
        // show progress bar or something like that.
    }, 3000);
}

</script>



</x-layout>
