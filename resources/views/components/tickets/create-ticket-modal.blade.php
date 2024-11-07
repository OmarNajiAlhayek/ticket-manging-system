<!-- Modal toggle -->
@php
    $users = App\Models\User::select('id', 'name')->get();
@endphp
<x-modals.show-btn class="show-modal-btn block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    Create Ticket
</x-modals.show-btn>

  <!-- Main modal -->
  <x-modals.modal ticketId="0">

      <div id="modal-content-0" class="relative w-full max-w-md max-h-full p-4 bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  Create New Ticket
              </h3>
              <x-modals.close-btn class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg close-modal-btn hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
              </x-modals.close-btn>

          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5">
            <form action="{{ route('tickets.store') }}" method="POST" class="p-4 md:p-5">
                @csrf

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
                                value="{{ old('title') }}"
                            >
                            <x-form-error name="title" />
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                            <label for="deadline" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Deadline
                            </label>
                          <input
                                type="datetime"
                                id="deadline"
                                name="deadline"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required
                                value="{{empty(old('deadline')) ? now()->addDay()->format('Y-m-d') : old('deadline')}}"
                          >
                          <x-form-error name="deadline" />
                      </div>


                      <div class="col-span-2 sm:col-span-1">
                          <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                          <select
                                id="status"
                                name="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                          >
                              <option @selected(old('status') === 'pending') value="pending">Pending</option>
                              <option @selected(old('status') === 'ongoing') value="ongoing">On Going</option>
                              <option @selected(old('status') === 'testing') value="testing">Testing</option>
                              <option @selected(old('status') === 'finished') value="finished">Finished</option>
                          </select>
                          <x-form-error name="status" />
                      </div>


{{-- ? assigned_users --}}
                      <div class="col-span-2">

                        <label for="assigned_users" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Assigned Users
                        </label>

                         <select
                            id="assigned_users"
                            name="assigned_users[]"
                            multiple
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        >
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                        </select>

                        <x-form-error name="assigned_users" />
                  </div>

                  {{-- ? assigned_users --}}





                      <div class="col-span-2">
                          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ticket Description</label>
                          <textarea
                                id="description"
                                name="description"
                                rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write ticket description here"
                          >{{ old('description') }}</textarea>
                          <x-form-error name="description" />
                      </div>
                  </div>
                  <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Add new ticket
                  </button>
              </form>
          </div>
      </div>
</x-modals.modal>
