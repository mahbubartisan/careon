<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Update Medical Test Service
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Update Medical Test Service</li>
            </ol>
        </nav>
    </div>

    <!-- Form Container -->
    <div class="rounded-md bg-white px-6 pb-3 pt-6 shadow dark:bg-[#132337]">
        <h2 class="mb-4 text-lg font-semibold tracking-tight text-gray-800 dark:text-gray-200">
            Medical Test Service Information
        </h2>

        <form method="post">
            <div class="space-y-4">
                <div class="space-y-4 rounded-xl border p-4 dark:border-[#1b2f46] dark:bg-[#102030]">

                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <!-- Service Type -->
                        <div>
                            <label for="service_type_id" class="block text-sm text-gray-700 dark:text-gray-400">
                                Service Type <span class="text-red-500">*</span>
                            </label>
                            <select wire:model="form.service_type_id" id="service_type_id"
                                class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-[11px] text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300">
                                <option value="">-- Select one --</option>
                                @foreach ($form->serviceTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>

                            @error("form.service_type_id")
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Service Name -->
                        <div>
                            <label for="service_name" class="block text-sm text-gray-700 dark:text-gray-400">
                                Service Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" wire:model="form.service_name" id="service_name"
                                placeholder="Enter Service Name"
                                class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                            @error("form.service_name")
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="image" class="block text-sm text-gray-700 dark:text-gray-400">
                            Service Image <span class="text-red-500">*</span>
                        </label>
                        <input type="file" wire:model="form.image" id="image"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                        @error("form.image")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Service Description -->
                    <div>
                        <label for="service_desc" class="block text-sm text-gray-700 dark:text-gray-400">
                            Service Description <span class="text-red-500">*</span>
                        </label>
                        <textarea rows="4" wire:model="form.service_desc" id="service_desc" placeholder="Enter Service Description"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300"></textarea>
                        @error("form.service_desc")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <h2 class="text-lg font-semibold tracking-tight text-gray-900">
                    Medical Tests
                </h2>

                <div class="rounded-lg border bg-white p-4">
                    <div class="space-y-4">
                        @foreach ($form->tests as $index => $test)
                            <div class="relative">
                                <!-- Trash icon (only when more than one row) -->
                                @if (count($form->tests) > 1)
                                    <button type="button" wire:click="removeTest({{ $index }})"
                                        class="absolute right-0 top-0 flex h-full items-start pt-8 text-red-500">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M10 11v6" />
                                            <path d="M14 11v6" />
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                            <path d="M3 6h18" />
                                            <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                        </svg>
                                    </button>
                                @endif

                                <div class="grid grid-cols-1 gap-4 pr-8 md:grid-cols-2">
                                    <!-- Test Name -->
                                    <div>
                                        <label class="mb-1 block text-sm font-medium text-gray-700">
                                            Test Name <span class="text-red-500">*</span>
                                        </label>

                                        <input type="text" wire:model="form.tests.{{ $index }}.test_name"
                                            placeholder="Test Name"
                                            class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:border-sky-500 focus:outline-none">

                                        @error("form.tests.$index.test_name")
                                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Price -->
                                    <div>
                                        <label class="mb-1 block text-sm font-medium text-gray-700">
                                            Price <span class="text-red-500">*</span>
                                        </label>

                                        <input type="number" wire:model.defer="form.tests.{{ $index }}.price"
                                            placeholder="Price"
                                            class="w-full rounded-md border border-gray-300 px-4 py-2.5 text-sm focus:border-sky-500 focus:outline-none">

                                        @error("form.tests.$index.price")
                                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        @endforeach

                        <!-- Add Button -->
                        <button type="button" wire:click="addTest"
                            class="rounded-full bg-sky-700 px-4 py-2 text-sm font-medium text-white hover:bg-sky-800">
                            + Add Test
                        </button>
                    </div>
                </div>



                <h2 class="text-lg font-semibold tracking-tight text-gray-900">
                    Labs
                </h2>

                <div class="space-y-4 rounded-xl border p-4 dark:border-[#1b2f46] dark:bg-[#102030]">
                    @foreach ($form->labs as $index => $lab)
                        <div class="relative">

                            <!-- Remove icon -->
                            @if (count($form->labs) > 1)
                                <button type="button" wire:click="removeLab({{ $index }})"
                                    class="absolute right-0 top-9 flex items-center text-red-500 hover:text-red-600">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M10 11v6" />
                                        <path d="M14 11v6" />
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                        <path d="M3 6h18" />
                                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                    </svg>
                                </button>
                            @endif

                            <!-- Lab Name -->
                            <div class="pr-8">
                                <label class="block text-sm text-gray-700 dark:text-gray-400">
                                    Lab Name <span class="text-red-500">*</span>
                                </label>

                                <input type="text" wire:model.defer="form.labs.{{ $index }}.lab_name"
                                    placeholder="Lab Name"
                                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />

                                @error("form.labs.$index.lab_name")
                                    <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    @endforeach

                    <!-- Add Button-->
                    <button type="button" wire:click="addLab"
                        class="rounded-full bg-sky-700 px-3 py-1.5 text-sm text-white">
                        + Add Lab
                    </button>
                </div>
            </div>

            <!-- Create Button -->
            <div class="mt-5 flex justify-end space-x-3">
                <button type="reset"
                    class="rounded-md px-4 py-2.5 text-sm text-red-500 transition-colors duration-300 hover:bg-red-100">
                    Reset
                </button>
                <button wire:click='update' type="button"
                    class="flex w-full items-center justify-center rounded-md bg-blue-500 px-5 py-3 text-sm leading-5 text-white transition duration-300 ease-in-out hover:bg-blue-600 focus:outline-none sm:w-auto sm:px-4 sm:py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="mr-2 h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                    Update
                </button>
            </div>
        </form>
    </div>

</div>
