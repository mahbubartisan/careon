<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Create Medical Service
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Create Medical Service</li>
            </ol>
        </nav>
    </div>

    <!-- Form Container -->
    <div class="rounded-md bg-white px-6 pb-3 pt-6 shadow dark:bg-[#132337]">
        <h2 class="mb-4 text-lg font-semibold tracking-tight text-gray-800 dark:text-gray-200">
            Medical Service Information
        </h2>

        <form <form wire:submit.prevent="store">

            <div class="space-y-4">
                <div class="space-y-4 rounded-xl border p-4 dark:border-[#1b2f46] dark:bg-[#102030]">

                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <!-- Service Type -->
                        <div>
                            <label for="service_type_id" class="block text-sm text-gray-700 dark:text-gray-400">
                                Service Type <span class="text-red-500">*</span>
                            </label>
                            <select wire:model="form.service_type_id" id="service_type_id" disabled
                                class="mt-2 w-full cursor-not-allowed rounded-md border border-gray-200 bg-gray-50 px-4 py-[11px] text-sm text-gray-800 focus:outline-none dark:border-[#233A57] dark:bg-[#0f1f33] dark:text-gray-400">
                                <option value="" hidden>-- Select one --</option>
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

                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <!-- Image Upload -->
                        <div>
                            <label for="image" class="block text-sm text-gray-700 dark:text-gray-400">
                                Service Image <span class="text-red-500">*</span>
                            </label>
                            <input type="file" wire:model="form.image" id="image"
                                class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                            <p class="mt-2 text-xs text-gray-500">
                                Accepted formats: JPEG, JPG, PNG and Webp (Max 1MB)
                            </p>
                            @error("form.image")
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Form Type -->
                        <div>
                            <label for="formType" class="block text-sm text-gray-700 dark:text-gray-400">
                                Form Type <span class="text-red-500">*</span>
                            </label>
                            <select wire:model.live="form.formType" id="formType"
                                class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-[14px] text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300">
                                <option value="" hidden>-- Select One --</option>
                                <option value="diagnostic">Diagnostic</option>
                                <option value="ambulance">Ambulance Support</option>
                                <option value="appointment">Appointment</option>
                                <option value="doctor-visit">Doctor Vist</option>
                            </select>

                            @error("form.formType")
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
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

                @if ($form->formType === "diagnostic")
                    {{-- <h2 class="text-lg font-semibold tracking-tight text-gray-900">
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
                                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-sky-500 focus:outline-none">

                                            @error("form.tests.$index.test_name")
                                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Price -->
                                        <div>
                                            <label class="mb-1 block text-sm font-medium text-gray-700">
                                                Price <span class="text-red-500">*</span>
                                            </label>

                                            <input type="number"
                                                wire:model.defer="form.tests.{{ $index }}.price"
                                                placeholder="Price"
                                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-sky-500 focus:outline-none">

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
                    </div> --}}
                    <h2 class="text-xl font-semibold text-gray-900">
                        Lab-wise Pricing per Test
                    </h2>

                    @foreach ($form->tests as $testIndex => $test)
                        <div class="relative space-y-6 rounded-xl border border-gray-200 p-6">

                            <!-- Remove Test -->
                            <button wire:click="removeTest({{ $testIndex }})" type="button"
                                class="absolute right-4 top-4 text-sm text-red-500">
                                Remove Test
                            </button>

                            <!-- Test Name -->
                            <div>
                                <label for="test_name" class="block text-sm text-gray-700 dark:text-gray-400">
                                    Test Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model="form.tests.{{ $testIndex }}.name" id="test_name"
                                    placeholder="Enter Test Name"
                                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                                @error("form.tests.{{ $testIndex }}.name")
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- LAB PRICING -->
                            <div class="space-y-4">
                                <h3 class="text-sm font-semibold text-gray-700">
                                    Lab Pricing
                                </h3>

                                @foreach ($test["labs"] as $labIndex => $lab)
                                    <div
                                        class="relative grid items-end gap-4 rounded-lg border border-gray-200 bg-white p-4 md:grid-cols-2">

                                        <!-- Remove Lab -->
                                        <button wire:click="removeLab({{ $testIndex }}, {{ $labIndex }})"
                                            type="button" class="absolute right-3 top-3 text-xs text-red-500">
                                            Remove
                                        </button>

                                        <!-- Lab Select -->
                                        <div>
                                            <label for="lab"
                                                class="block text-sm text-gray-700 dark:text-gray-400">
                                                Lab <span class="text-red-500">*</span>
                                            </label>
                                            <select
                                                wire:model="form.tests.{{ $testIndex }}.labs.{{ $labIndex }}.lab_id"
                                                id="lab"
                                                class="mt-2 w-full rounded-md border border-gray-200 px-4 py-[11px] text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300">
                                                <option value="" hidden>-- Select One --</option>
                                                @foreach ($form->labs as $labOption)
                                                    <option value="{{ $labOption["id"] }}">
                                                        {{ $labOption["name"] }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error("form.formType")
                                                <span class="text-xs text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Price -->
                                        <div>
                                            <label for="price"
                                                class="block text-sm text-gray-700 dark:text-gray-400">
                                                Price (৳) <span class="text-red-500">*</span>
                                            </label>
                                            <input type="number"
                                                wire:model="form.tests.{{ $testIndex }}.labs.{{ $labIndex }}.price"
                                                id="price" placeholder="Enter Price"
                                                class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />

                                            @error("form.tests.{{ $testIndex }}.labs.{{ $labIndex }}.price")
                                                <span class="text-xs text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Add Lab -->
                                <button wire:click="addLab({{ $testIndex }})" type="button"
                                    class="rounded-xl bg-blue-500 px-4 py-2.5 text-sm font-medium text-white">
                                    + Add Lab
                                </button>
                            </div>
                        </div>
                    @endforeach

                    <!-- Add Test -->
                    <button wire:click="addTest" type="button"
                        class="rounded-xl bg-teal-500 px-4 py-2.5 text-sm font-medium text-white">
                        + Add Another Test
                    </button>
                @endif

                <!-- Featured Status -->
                <div class="space-y-2">
                    <h2 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-gray-300">
                        Featured Status
                    </h2>

                    <!-- Checkboxes -->
                    <div class="rounded-xl border p-4">

                        <div class="flex gap-4">

                            <!-- Most Popular -->
                            <label wire:click="toggleBadge(1)"
                                class="{{ $form->badge == 1
                                    ? "border-blue-400 bg-blue-50 text-blue-600"
                                    : "border-gray-300 bg-white text-gray-700 hover:bg-gray-50" }} flex cursor-pointer items-center gap-3 rounded-full border px-4 py-2 text-sm font-medium transition">

                                <span
                                    class="{{ $form->badge == 1 ? "bg-blue-500" : "bg-gray-300" }} h-3 w-3 rounded-full">
                                </span>

                                Most Popular
                            </label>


                            <!-- 24/7 -->
                            <label wire:click="toggleBadge(2)"
                                class="{{ $form->badge == 2
                                    ? "border-blue-400 bg-blue-50 text-blue-600"
                                    : "border-gray-300 bg-white text-gray-700 hover:bg-gray-50" }} flex cursor-pointer items-center gap-3 rounded-full border px-4 py-2 text-sm font-medium transition">

                                <span
                                    class="{{ $form->badge == 2 ? "bg-blue-500" : "bg-gray-300" }} h-3 w-3 rounded-full">
                                </span>

                                24/7
                            </label>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Create Button -->
            <div class="mt-5 flex justify-end space-x-3">
                <button type="reset"
                    class="rounded-md px-4 py-2.5 text-sm text-red-500 transition-colors duration-300 hover:bg-red-100">
                    Reset
                </button>
                <button type="submit"
                    class="flex w-full items-center justify-center rounded-md bg-blue-500 px-5 py-3 text-sm leading-5 text-white transition duration-300 ease-in-out hover:bg-blue-600 focus:outline-none sm:w-auto sm:px-4 sm:py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="mr-2 h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                    Save
                </button>
            </div>
        </form>
    </div>

</div>
