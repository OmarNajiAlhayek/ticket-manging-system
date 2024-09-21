@props([
    'ticket' => new App\Models\Ticket(),
])
<!-- Modal toggle -->
<x-modals.show-btn ticketId="{{ $ticket->id }}" class="text-sm text-blue-600 show-modal-btn hover:underline">
    View more...
</x-modals.show-btn>

  <!-- Main modal -->
  <x-modals.modal ticketId="{{ $ticket->id }}">

      <div id="modal-content-{{ $ticket->id }}" class="relative w-full max-w-md max-h-full p-4 bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  Update Ticket
              </h3>
              <x-modals.close-btn ticketId="{{ $ticket->id }}" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg close-modal-btn hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
              </x-modals.close-btn>

          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5">
            <form action="{{ route('tickets.update', $ticket) }}" method="POST" class="p-4 md:p-5">
                @csrf
                @method('PUT')
                  <div class="grid grid-cols-2 gap-4 mb-4">
                      <div class="col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Title
                            </label>
                            <input
                                {{-- onblur="startTitleValidation(this)"
                                onfocus="validateTitle(this)"
                                oninput="validateTitle(this)" --}}
                                type="text"
                                id="title"
                                name="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type ticket title"
                                value="{{ $ticket->title }}"
                            >
                            <x-form-error name="title" />
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                            <label for="deadline" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Deadline
                            </label>
                          <input
                                 type="datetime" name="deadline" id="deadline" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                 required
                                 value="{{ $ticket->deadline }}">
                          <x-form-error name="deadline" />
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                          <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                          <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <option @selected($ticket->status === 'pending') value="pending">Pending</option>
                              <option @selected($ticket->status === 'ongoing') value="ongoing">On Going</option>
                              <option @selected($ticket->status === 'testing') value="testing">Testing</option>
                              <option @selected($ticket->status === 'finished') value="finished">Finished</option>
                          </select>
                          <x-form-error name="status" />
                      </div>
                      <div class="col-span-2">
                          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ticket Description</label>
                          <textarea
                                id="description"
                                name="description"
                                rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write ticket description here"
                          >{{ $ticket->description }}</textarea>
                          <x-form-error name="description" />
                      </div>
                  </div>
                  <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Update ticket
                  </button>
                  <button
                        onclick="if (confirm('Are you sure that you want to delete this ticket?')) { document.getElementById('delete-form').submit(); } else { event.preventDefault(); }"
                        form="delete-form-{{ $ticket->id }}"
                        type="submit"
                        class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                          </svg>

                    Delete ticket
                </button>

              </form>

              <form id="delete-form-{{ $ticket->id }}" action="{{ route('tickets.destroy', $ticket) }}" method="POST">
                @csrf
                @method('DELETE')
              </form>
          </div>
      </div>
    </x-modals.modal>
