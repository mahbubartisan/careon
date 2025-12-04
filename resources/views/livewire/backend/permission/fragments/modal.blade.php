<div class="fixed inset-0 z-20 bg-gray-900  bg-opacity-70 transition-opacity overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-scroll-inside-viewport-modal-label">
    <div class="ease-out transition-all sm:max-w-lg sm:mx-auto p-5 md:p-0 lg:p-0">
        <div
            class="flex flex-col mt-7 bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-[#132337] dark:border-[#233A57]">
            <div class="flex justify-between items-center p-5 border-b dark:border-gray-700">
                <p class="text-xl dark:text-gray-200">
                    {{ $form->editMode ? "Update" : "Create" }} Permission
                </p>
                <button type="button" wire:click='closeModal'
                    class="flex justify-center items-center text-gray-400 dark:text-gray-600 hover:text-red-500 dark:hover:text-red-500 focus:outline-none"
                    aria-label="Close" data-hs-overlay="#hs-scroll-inside-viewport-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-5">
                <form wire:submit.prevent="{{ $form->editMode ? "update" : "store" }}" method="POST" class="space-y-3">
                    <div>
                        <label for="name" class="block text-sm text-gray-700 dark:text-gray-400">
                            Permission Name<span class="text-red-500">*</span>
                        </label>
                        <input type="text" wire:model='form.name' id="name" placeholder="Enter Permission Name"
                            class="w-full mt-2 px-4 py-3 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:ring-0 focus:border-blue-600 transition duration-300 ease-in-out" />
                        @error("form.name")
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div
                        class="flex flex-col items-center justify-end px-6 py-3 mt-7 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-3.5 sm:flex-row">
                        <button type="button" wire:click='closeModal'
                            class="flex items-center justify-center w-full px-5 py-3 text-sm leading-5 transition-colors duration-150 border border-gray-300 dark:border-[#233A57] rounded-md dark:text-white sm:px-4 sm:py-2 sm:w-auto focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="mr-2 h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Close
                        </button>
                        <button type="submit"
                            class="flex items-center justify-center w-full px-5 py-3 text-sm leading-5 text-white transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 rounded-md sm:w-auto sm:px-4 sm:py-2 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="mr-2 h-5 w-5">
                                <path fill-rule="evenodd"
                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $form->editMode ? "Update" : "Save" }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
