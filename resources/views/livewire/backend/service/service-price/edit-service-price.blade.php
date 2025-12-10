<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Edit Service Price
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Edit Service Price</li>
            </ol>
        </nav>
    </div>

    <div class="rounded-md bg-white px-6 pb-3 pt-6 shadow dark:bg-[#132337]">
        <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-gray-300">
            Service Price Information
        </h2>
       
        <form method="post">

            <!-- SINGLE SERVICE -->
            <div class="mb-4">
                <label class="block text-sm text-gray-700">Service*</label>
                <select wire:model="form.serviceId"
                    class="mt-2 w-full rounded-lg border border-gray-200 text-sm px-4 py-2.5 focus:border-blue-500 focus:outline-none">
                    <option value="" hidden>-- Select a Service --</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- MULTIPLE PACKAGES -->
            <div class="space-y-6">
                @foreach ($form["groups"] as $gIndex => $group)
                    <div class="space-y-4 rounded-lg border bg-white p-4">

                        <!-- Group Header -->
                        <div class="flex items-center justify-between">
                            <h3 class="font-semibold tracking-tight">Package & Care Information</h3>

                            @if (count($form["groups"]) > 1)
                                <button type="button" wire:click="removeGroup({{ $gIndex }})"
                                    class="text-sm text-red-500">
                                    Remove
                                </button>
                            @endif
                        </div>

                        <!-- PACKAGE SELECT -->
                        <div>
                            <label class="block text-sm">Package*</label>
                            <select wire:model.live="form.groups.{{ $gIndex }}.packageId"
                                class="mt-2 w-full rounded-lg border border-gray-200 text-sm px-4 py-2.5 focus:border-blue-500 focus:outline-none">
                                <option value="" hidden>-- Select a Package --</option>
                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- CARE LEVEL SECTION -->
                        <div class="space-y-6">

                            @foreach ($group["careLevels"] as $cIndex => $care)
                                <div class="space-y-3 rounded-md border p-4">

                                    <!-- Care Level Header -->
                                    <div class="flex justify-end">
                                        @if (count($group["careLevels"]) > 1)
                                            <button type="button"
                                                wire:click="removeCareLevel({{ $gIndex }}, {{ $cIndex }})"
                                                class="text-sm text-red-500">
                                                Remove
                                            </button>
                                        @endif
                                    </div>

                                    <!-- CARE LEVEL SELECT -->
                                    <div>
                                        <label class="block text-sm">Care Level*</label>
                                        <select
                                            wire:model="form.groups.{{ $gIndex }}.careLevels.{{ $cIndex }}.careLevelId"
                                            class="mt-2 w-full rounded-lg border border-gray-200 text-sm px-4 py-2.5 focus:border-blue-500 focus:outline-none">
                                            <option value="" hidden>-- Select a Level --</option>
                                            @foreach ($filteredCareLevels[$gIndex] ?? [] as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- HOURS/PRICE LIST -->
                                    <div class="space-y-3">
                                        @foreach ($care["levels"] as $lIndex => $row)
                                            <div class="flex items-center gap-3">

                                                <input type="number"
                                                    wire:model="form.groups.{{ $gIndex }}.careLevels.{{ $cIndex }}.levels.{{ $lIndex }}.hours"
                                                    placeholder="Hour (e.g. 8)"
                                                    class="w-full rounded-lg border border-gray-200 text-sm px-4 py-2.5 focus:border-blue-500 focus:outline-none">

                                                <input type="number"
                                                    wire:model="form.groups.{{ $gIndex }}.careLevels.{{ $cIndex }}.levels.{{ $lIndex }}.price"
                                                    placeholder="Price"
                                                    class="w-full rounded-lg border border-gray-200 text-sm px-4 py-2.5 focus:border-blue-500 focus:outline-none">

                                                @if (count($care["levels"]) > 1)
                                                    <button type="button"
                                                        wire:click="removeLevel({{ $gIndex }}, {{ $cIndex }}, {{ $lIndex }})"
                                                        class="text-red-500">
                                                        X
                                                    </button>
                                                @endif

                                            </div>
                                        @endforeach

                                        <button type="button"
                                            wire:click="addLevel({{ $gIndex }}, {{ $cIndex }})"
                                            class="rounded-full bg-sky-700 px-3 py-1.5 text-sm text-white">
                                            + Add Hours/Price
                                        </button>
                                    </div>

                                </div>
                            @endforeach

                            <!-- Add Care Level -->
                            <button type="button" wire:click="addCareLevel({{ $gIndex }})"
                                class="rounded-full bg-green-600 px-3 py-1.5 text-sm text-white">
                                + Add Care Level
                            </button>

                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Add Package -->
            <button type="button" wire:click="addGroup" class="mt-4 rounded-full bg-blue-600 px-4 py-2 text-white">
                + Add Another Package
            </button>


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
