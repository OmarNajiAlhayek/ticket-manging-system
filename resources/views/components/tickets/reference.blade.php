
  <!-- Modal toggle -->
  <button id="toggleModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
  </button>

  <!-- Main modal -->
  <div id="crud-modal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 flex items-center justify-center hidden w-full h-full bg-gray-800 bg-opacity-50" inert>
      <div class="relative w-full max-w-md max-h-full p-4 bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  Create New Product
              </h3>
              <button type="button" id="closeModal" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
          <!-- Modal body -->
          <form class="p-4 md:p-5">
            <form action="{{ route('tickets.store') }}" method="POST" class="p-4 md:p-5">
                @csrf

                  <div class="grid grid-cols-2 gap-4 mb-4">
                      <div class="col-span-2">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                          <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                          <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                          <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                          <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <option selected="">Select category</option>
                              <option value="TV">TV/Monitors</option>
                              <option value="PC">PC</option>
                              <option value="GA">Gaming/Console</option>
                              <option value="PH">Phones</option>
                          </select>
                      </div>
                      <div class="col-span-2">
                          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ticket Description</label>
                          <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>
                      </div>
                  </div>
                  <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Add new ticket
                  </button>
              </form>
          </form>
      </div>
  </div>


  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('toggleModal');
        const closeButton = document.getElementById('closeModal');
        const modal = document.getElementById('crud-modal');
        const modalContent = modal.querySelector('.relative.bg-white');
        const form = modal.querySelector('form');

        function hasFormData() {
            if (! isCurrentSelectedValueEqualsDefaultValue())
                return true;

            const inputs = form.querySelectorAll('input, textarea');

            for (let input of inputs) {
                if (input.type === 'hidden') {
                    continue;
                }

                if (input.type === 'checkbox' || input.type === 'radio') {
                    if (input.checked) {
                        return true;
                    }
                } else if (input.value.trim() !== '') {
                    return true;
                }
            }
            return false;
        }

        function isCurrentSelectedValueEqualsDefaultValue()
        {
            const currentSelectedValue = form.querySelector('select').value;
            const defaultSelectdValue = form.querySelectorAll('option')[0].value;

            if (currentSelectedValue === defaultSelectdValue) {
                return true;
            }
            return false;
        }

        function closeModal() {
            if (hasFormData()) {
                if (confirm('Are you sure? You will lose your data.')) {
                    modal.classList.add('hidden');
                    modal.setAttribute('inert', '');
                    modal.setAttribute('aria-hidden', 'true');
                }
            } else {
                clearFormInputs();
                modal.classList.add('hidden');
                modal.setAttribute('inert', '');
                modal.setAttribute('aria-hidden', 'true');
            }
        }

        function clearFormInputs() {
        const inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            if (input.type === 'checkbox' || input.type === 'radio') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });
    }

        if (toggleButton) {
            toggleButton.addEventListener('click', function () {
                modal.classList.toggle('hidden');
                if (modal.classList.contains('hidden')) {
                    modal.setAttribute('inert', '');
                    modal.setAttribute('aria-hidden', 'true');
                } else {
                    modal.removeAttribute('inert');
                    modal.setAttribute('aria-hidden', 'false');
                }
            });
        }

        if (closeButton) {
            closeButton.addEventListener('click', function () {
                closeModal();
            });
        }

        // Close modal when clicking outside of the modal content
        modal.addEventListener('click', function (event) {
            if (!modalContent.contains(event.target)) {
                closeModal();
            }
        });
    });
    </script>
