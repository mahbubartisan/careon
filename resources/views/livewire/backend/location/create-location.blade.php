<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Add Location
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Add Location</li>
            </ol>
        </nav>
    </div>

    <div class="rounded-md bg-white px-6 pb-3 pt-6 shadow dark:bg-[#132337]">
        <h2 class="mb-4 text-[15px] font-medium text-gray-900 dark:text-gray-300">Location Info</h2>
        <form wire:submit.prevent="store" class="space-y-4">

            <!-- Select Group -->
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-400">Location Group*</label>

                <select wire:model="form.location_group_id"
                class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:ring-0 focus:border-blue-600 transition duration-300 ease-in-out" />
                    <option value="">-- Select a Location Group --</option>
                    @foreach ($form->locationGroups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>

                @error("form.location_group_id")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Dynamic Fields -->
            <div class="space-y-4">
                <label class="block text-sm text-gray-700 dark:text-gray-400">Location Name*</label>
            
                @foreach ($form->locations as $index => $loc)
                    <div>
                        <div class="flex items-center gap-3">
                            <input type="text" wire:model="form.locations.{{ $index }}.name"
                                placeholder="Enter Location Name"
                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:ring-0 focus:border-blue-600 transition duration-300 ease-in-out" />
            
                            @if (count($form->locations) > 1)
                                <button type="button" wire:click="removeLocation({{ $index }})"
                                    class="flex items-center justify-center h-[40px] w-10 rounded bg-red-500 text-white hover:bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 
                                               0 00-1-1h-4a1 1 0 00-1 1v3m-4 0h14" />
                                    </svg>
                                </button>
                            @endif
                        </div>
            
                        @error("form.locations.$index.name")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                @endforeach
            
                <button type="button" wire:click="addLocation"
                    class="rounded bg-blue-500 px-4 py-2 text-sm text-white hover:bg-blue-600">
                    + Add More
                </button>
            </div>
            
            <!-- Actions -->
            <div class="flex justify-end space-x-3 pt-4">
                <button type="reset" class="rounded-md px-4 py-2.5 text-sm text-red-500 transition hover:bg-red-100">
                    Reset
                </button>

                <button type="submit"
                    class="flex items-center rounded-md bg-blue-500 px-5 py-3 text-sm text-white hover:bg-blue-600">
                    Save
                </button>
            </div>

        </form>
    </div>
</div>
