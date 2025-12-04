<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Add Care Level
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Add Care Level</li>
            </ol>
        </nav>
    </div>

    <div class="rounded-md bg-white px-6 pb-3 pt-6 shadow dark:bg-[#132337]">
        <h2 class="mb-4 text-[15px] font-medium text-gray-900 dark:text-gray-300">Care Level Info</h2>
        <form method="post" class="space-y-4">
            <!-- Package -->
            <div>
                <label for="packageId" class="block text-sm text-gray-700 dark:text-gray-400">Package*</label>

                <select wire:model="form.packageId" id="packageId"
                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                <option value="">-- Select a Package --</option>
                @foreach ($form->packages as $package)
                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                @endforeach
                </select>

                @error("form.packageId")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <!-- Care Level -->
            <div>
                <label for="name" class="block text-sm text-gray-700 dark:text-gray-400">
                    Care Level*
                </label>
                <input type="text" wire:model="form.name" id="name" placeholder="Enter Care Level"
                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                @error("form.name")
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
                    <input type="hidden" wire:model="form.description" id="description">
                </div>
                <div class="mt-1">
                    @error("form.description")
                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- Dynamic Hours & Price Inputs -->
            <div class="space-y-4">
                @foreach ($form->levels as $index => $level)
                    <div class="flex items-start gap-3">

                        <!-- Hour -->
                        <div class="flex-1">
                            <label class="mb-1 block text-sm text-gray-700 dark:text-gray-400">
                                Hours*
                            </label>
                            <input type="number" wire:model="form.levels.{{ $index }}.hours"
                                placeholder="Hour (e.g. 8)"
                                class="w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                            @error("form.levels.$index.hours")
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="flex-1">
                            <label class="mb-1 block text-sm text-gray-700 dark:text-gray-400">
                                Price*
                            </label>
                            <input type="number" wire:model="form.levels.{{ $index }}.price" placeholder="Price"
                                class="w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                            @error("form.levels.$index.price")
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Remove Button -->
                        @if (count($form->levels) > 1)
                            <button type="button" wire:click="removeLevel({{ $index }})"
                                class="mt-5 flex h-[42px] w-10 items-center justify-center rounded-md bg-red-500 text-white hover:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1
                                       0 00-1-1h-4a1 1 0 00-1 1v3m-4 0h14" />
                                </svg>
                            </button>
                        @endif
                    </div>
                @endforeach

                <!-- Add Button -->
                <button type="button" wire:click="addLevel"
                    class="mt-3 rounded-md bg-blue-600 px-4 py-2.5 text-sm text-white">
                    + Add More
                </button>
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
        </form>
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
            @this.set('form.description', quill.root.innerHTML);
        });
    </script>
</div>
