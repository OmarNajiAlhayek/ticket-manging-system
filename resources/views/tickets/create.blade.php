<x-layout>
    <x-slot:heading>
        Create Ticket
    </x-slot:heading>
{{-- TODO: title --}}
{{-- ! --}}

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf

        <div class="space-y-12">
            <div class="pb-12 border-b border-gray-900/10">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

                <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="title" id="title" placeholder="Coding..." />

                            <x-form-error name="title" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="description">Description</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="description" id="description" placeholder="This ticket is about..." />

                            <x-form-error name="description" />
                        </div>
                    </x-form-field>


                    <x-form-field>
                        <x-form-label for="deadline">Deadline (Tomorrow is default Deadline.)</x-form-label>

                        <div class="mt-2">
                            <x-form-input type="date" name="deadline" id="deadline" value="{{now()->addDay()->format('Y-m-d')}}" />

                            <x-form-error name="deadline" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="status">Status</x-form-label>

                        <div class="mt-2">

                            <div class="flex p-1 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <select id="status" name="status" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    <option value="pending">Pending</option>
                                    <option value="ongoing">On Going</option>
                                    <option value="testing">Testing</option>
                                    <option value="finishing">Finishing</option>
                                </select>
                            </div>

                            <x-form-error name="status" />
                        </div>
                    </x-form-field>

                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-6 gap-x-6">
            <a href="{{ url()->previous() }}" class="text-sm font-semibold leading-6 text-gray-900 hover:cursor-pointer">Cancel</a>
            <x-form-button>Create Ticket</x-form-button>
        </div>
    </form>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('deadline');
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            const formattedDate = tomorrow.toISOString().split('T')[0]; // Format as YYYY-MM-DD
            input.value = formattedDate;
        });
    </script> --}}
</x-layout>
