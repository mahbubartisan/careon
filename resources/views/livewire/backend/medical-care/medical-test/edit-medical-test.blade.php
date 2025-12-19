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
                                ServiceType*
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
                                Service Name*
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
                            Service Image*
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
                            Service Description*
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
                @foreach ($form->tests as $index => $test)
                    <div class="relative space-y-4 rounded-xl border p-4 dark:border-[#1b2f46] dark:bg-[#102030]">

                        @if (count($form->tests) > 1)
                            <button type="button" wire:click="removeTest({{ $index }})"
                                class="absolute right-4 top-4 text-sm text-red-500">
                                Remove
                            </button>
                        @endif

                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                            <!-- Test Name -->
                            <div>
                                <label class="block text-sm text-gray-700 dark:text-gray-400">
                                    Test Name*
                                </label>

                                <input type="text" wire:model="form.tests.{{ $index }}.test_name"
                                    placeholder="Test Name"
                                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />

                                @error("form.tests.$index.test_name")
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Price -->
                            <div>
                                <label class="block text-sm text-gray-700 dark:text-gray-400">
                                    Price (৳)*
                                </label>

                                <input type="number" wire:model="form.tests.{{ $index }}.price"
                                    placeholder="1000"
                                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />

                                @error("form.tests.$index.price")
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                @endforeach


                <button type="button" wire:click="addTest"
                    class="rounded-full bg-sky-700 px-3 py-1.5 text-sm text-white">
                    + Add Test
                </button>


                <h2 class="text-lg font-semibold tracking-tight text-gray-900">
                    Labs
                </h2>
                @foreach ($form->labs as $index => $lab)
                    <div class="relative space-y-4 rounded-xl border p-4 dark:border-[#1b2f46] dark:bg-[#102030]">

                        @if (count($form->labs) > 1)
                            <button type="button" wire:click="removeLab({{ $index }})"
                                class="absolute right-4 top-4 text-sm text-red-500">
                                Remove
                            </button>
                        @endif

                        <!-- Lab Name -->
                        <div>
                            <label class="block text-sm text-gray-700 dark:text-gray-400">
                                Lab Name*
                            </label>

                            <input type="text" wire:model="form.labs.{{ $index }}.lab_name"
                                placeholder="Lab Name"
                                class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />

                            @error("form.labs.$index.lab_name")
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                @endforeach


                <button type="button" wire:click="addLab"
                    class="rounded-full bg-sky-700 px-3 py-1.5 text-sm text-white">
                    + Add Lab
                </button>

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
