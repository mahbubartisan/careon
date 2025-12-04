<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Create Service
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Create Service</li>
            </ol>
        </nav>
    </div>
    <div class="rounded-md bg-white px-6 pb-3 pt-6 shadow dark:bg-[#132337]">
        <h2 class="mb-4 text-[15px] font-medium text-gray-900 dark:text-gray-300">Service Info</h2>
        {{-- <form method="post" class="space-y-6">
            <!-- Image -->
            <div>
                <label for="image" class="block text-sm text-gray-700 dark:text-gray-400">
                    Image*
                </label>
                <input type="file" wire:model="form.image" id="image"
                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                @error("form.image")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm text-gray-700 dark:text-gray-400">
                    Name*
                </label>
                <input type="text" wire:model="form.name" id="name" placeholder="Enter Name"
                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                @error("form.name")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Service Type -->
            <div>
                <label for="service_type_id" class="block text-sm text-gray-700 dark:text-gray-400">Service Type*</label>
                <select wire:model="form.service_type_id" id="service_type_id"
                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                <option value="">-- Select a Service Type --</option>
                @foreach ($form->serviceTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
                </select>

                @error("form.service_type_id")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <div wire:ignore>
                    <label for="editorDesc" class="mb-2 block text-sm text-gray-700 dark:text-gray-400">
                        Description*
                    </label>
                    <div id="editorDesc" style="height: 200px;"></div>
                    <input type="hidden" wire:model="form.short_desc" id="description">
                </div>
                <div class="mt-1">
                    @error("form.short_desc")
                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Create Button -->
            <div class="mt-5 flex justify-end space-x-3">
                <button type="reset"
                    class="rounded-md px-4 py-2.5 text-sm text-red-500 transition-colors duration-300 hover:bg-red-100">
                    Reset
                </button>
                <button wire:click='store' type="button"
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
        </form> --}}

        {{-- <div class="space-y-10">

            <!-- Service Info -->
            <div class="rounded-xl border bg-white p-6 shadow-sm dark:bg-[#102030] dark:border-[#1b2f46]">
                <h2 class="text-lg font-bold text-gray-700 dark:text-gray-200">Service Information</h2>
        
                <div class="mt-5 grid grid-cols-2 gap-5">
        
                    <!-- Name -->
                    <div>
                        <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Service Name</label>
                        <input type="text" wire:model="form.name"
                               class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]">
                        @error("form.name") <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>
        
                    <!-- Service Type -->
                    <div>
                        <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Service Type</label>
                        <select wire:model="form.service_type_id"
                                class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]">
                            <option value="">Select Type</option>
                            @foreach ($form->serviceTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error("form.service_type_id") <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>
        
                    <!-- Badge -->
                    <div class="flex items-center gap-2 pt-6">
                        <input type="checkbox" wire:model="form.badge"
                               class="h-5 w-5 rounded border-gray-300 dark:border-gray-600">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Show Badge?</span>
                    </div>
        
                    <!-- Status -->
                    <div class="flex items-center gap-2 pt-6">
                        <input type="checkbox" wire:model="form.status"
                               class="h-5 w-5 rounded border-gray-300 dark:border-gray-600">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Active?</span>
                    </div>
        
                </div>
        
                <!-- Short Description -->
                <div class="mt-4">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Short Description</label>
                    <textarea wire:model="form.short_desc"
                              class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]"></textarea>
                    @error("form.short_desc") <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                </div>
        
                <!-- Image -->
                <div class="mt-4">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Service Image</label>
                    <input type="file" wire:model="form.image"
                           class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]">
                    @error("form.image") <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                </div>
            </div>
        
        
            <!-- Care Levels -->
            <div class="space-y-6">
                @foreach ($form->care_levels as $index => $level)
                    <div class="rounded-xl border bg-white p-6 shadow-sm dark:bg-[#102030] dark:border-[#1b2f46]">
        
                        <h2 class="text-lg font-bold text-gray-700 dark:text-gray-200">
                            {{ $level['name'] }} Care Level
                        </h2>
        
                        <!-- Description -->
                        <div class="mt-4">
                            <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Description</label>
                            <textarea wire:model="form.care_levels.{{ $index }}.description"
                                      class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]"></textarea>
                        </div>
        
                        <!-- Hours & Prices -->
                        <div class="mt-4">
                            <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Hours & Prices</label>
        
                            @foreach ($level["options"] as $oIndex => $option)
                                <div class="mt-2 grid grid-cols-5 gap-3">
        
                                    <input type="number"
                                           placeholder="Hours"
                                           wire:model="form.care_levels.{{ $index }}.options.{{ $oIndex }}.hours"
                                           class="rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]">
        
                                    <input type="number"
                                           placeholder="Price"
                                           wire:model="form.care_levels.{{ $index }}.options.{{ $oIndex }}.price"
                                           class="rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]">
        
                                    <button type="button"
                                            wire:click="removeOption({{ $index }}, {{ $oIndex }})"
                                            class="rounded-lg bg-red-500 px-3 py-1 text-white">
                                        X
                                    </button>
                                </div>
                            @endforeach
        
                            <button type="button"
                                wire:click="addOption({{ $index }})"
                                class="mt-2 rounded-lg border border-gray-300 px-4 py-2 text-sm dark:border-gray-600">
                                + Add Hour/Price
                            </button>
                        </div>
        
                    </div>
                @endforeach
            </div>
        
            <!-- Save Button -->
            <div class="text-right">
                <button wire:click="save"
                        class="rounded-lg bg-blue-600 px-6 py-2 text-white shadow hover:bg-blue-700">
                    Save Service
                </button>
            </div>
        
        </div> --}}

        <div class="space-y-10">

            <!-- ==============================
                 Service Information
            =============================== -->
            <div class="rounded-xl border bg-white p-6 shadow-sm dark:border-[#1b2f46] dark:bg-[#102030]">
                <h2 class="flex items-center gap-2 text-xl font-semibold text-gray-800 dark:text-gray-200">
                    <i class="fa-solid fa-circle-info text-blue-500"></i>
                    Service Information
                </h2>

                <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">

                    <!-- Service Name -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Service Name</label>
                        <input type="text" wire:model="form.name"
                            class="mt-1 w-full rounded-lg border-gray-300 focus:ring-blue-500 dark:border-gray-600 dark:bg-[#0d1a28]">
                        @error("form.name")
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Service Type -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Service Type</label>
                        <select wire:model="form.service_type_id"
                            class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]">
                            <option value="">Select Type</option>
                            @foreach ($form->serviceTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error("form.service_type_id")
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Package Dropdown -->
                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Package</label>
                        <select wire:model="form.packageId"
                            class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]">
                            <option value="">Select Package</option>
                            @foreach ($form->packages as $pkg)
                                <option value="{{ $pkg->id }}">{{ $pkg->name }}</option>
                            @endforeach
                        </select>
                        @error("form.packageId")
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <!-- Badge -->
                    <div class="flex items-center gap-3 pt-6">
                        <input type="checkbox" wire:model="form.badge"
                            class="h-5 w-5 rounded border-gray-400 dark:border-gray-600">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Show Badge</span>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center gap-3 pt-6">
                        <input type="checkbox" wire:model="form.status"
                            class="h-5 w-5 rounded border-gray-400 dark:border-gray-600">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Active</span>
                    </div> --}}

                </div>

                <!-- Short Description -->
                <div class="mt-4">
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Short Description</label>
                    <textarea wire:model="form.short_desc"
                        class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]" rows="3"></textarea>
                </div>

                <!-- Image Upload -->
                <div class="mt-4">
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Service Image</label>
                    <input type="file" wire:model="form.image"
                        class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]">
                </div>

            </div>


            <!-- ==============================
                 Dynamic Care Levels
            =============================== -->
            <div class="space-y-8">

                @foreach ($form->care_levels as $index => $level)
                    <div class="rounded-xl border bg-white p-6 shadow-md dark:border-[#1b2f46] dark:bg-[#102030]">

                        {{-- <h3 class="mb-2 flex items-center gap-2 text-lg font-semibold text-gray-800 dark:text-gray-200">
                            <i class="fa-solid fa-layer-group text-blue-500"></i>
                            {{ $level["name"] }} Care Level
                        </h3> --}}
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Package</label>
                            <select wire:model="form.care_level_id"
                                class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]">
                                <option value="">-- Select a Care Level --</option>
                                @foreach ($form->careLevels as $careLevel)
                                    <option value="{{ $careLevel->id }}">{{ $careLevel->name }}</option>
                                @endforeach
                            </select>
                            @error("form.care_level_id")
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Description
                            </label>
                            <textarea wire:model="form.care_levels.{{ $index }}.description"
                                class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]" rows="2"></textarea>
                        </div>

                        <!-- Hours & Prices -->
                        <div class="mt-5">
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Hours & Pricing Options
                            </label>

                            <div class="mt-2 space-y-3">

                                @foreach ($level["options"] as $oIndex => $option)
                                    <div class="grid grid-cols-1 items-center gap-3 md:grid-cols-5">

                                        <!-- Hours -->
                                        <input type="number" placeholder="Hours"
                                            wire:model="form.care_levels.{{ $index }}.options.{{ $oIndex }}.hours"
                                            class="rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]" />

                                        <!-- Price -->
                                        <input type="number" placeholder="Price"
                                            wire:model="form.care_levels.{{ $index }}.options.{{ $oIndex }}.price"
                                            class="rounded-lg border-gray-300 dark:border-gray-600 dark:bg-[#0d1a28]" />

                                        <!-- Remove Button -->
                                        <button type="button"
                                            wire:click="removeOption({{ $index }}, {{ $oIndex }})"
                                            class="col-span-full rounded-lg bg-red-500 px-3 py-2 font-semibold text-white hover:bg-red-600 md:col-span-1">
                                            Remove
                                        </button>
                                    </div>
                                @endforeach

                            </div>

                            <!-- Add Option Button -->
                            <button type="button" wire:click="addOption({{ $index }})"
                                class="mt-3 rounded-full border border-gray-400 px-4 py-2 text-sm font-medium hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-[#1b2f46]">
                                + Add Hour/Price
                            </button>
                        </div>

                    </div>
                @endforeach

            </div>

            <!-- ==============================
                 Save Button
            =============================== -->
            <div class="text-right">
                <button wire:click="save"
                    class="rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white shadow hover:bg-blue-700">
                    Save Service
                </button>
            </div>

        </div>


    </div>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        var quill = new Quill('#editorDesc', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, 3, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                ]
            }
        });

        // Update Livewire model when content changes
        quill.on('text-change', function() {
            @this.set('form.short_desc', quill.root.innerHTML);
        });
    </script>
</div>
