<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Service Price
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Service Price</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->
    <div class="my-5 flex justify-end">
        @can("create service price")
            <a href="{{ route("create.service.price") }}"
                class="inline-flex items-center justify-center rounded-md bg-blue-500 px-3.5 py-2.5 text-sm text-white shadow-lg transition-colors duration-500 hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="mr-2 h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Add Service Price
            </a>
        @endcan
    </div>

    {{-- <div class="overflow-x-auto rounded-lg border bg-white">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3">Service</th>
                    <th class="px-4 py-3">Packages & Care Levels</th>
                    <th class="px-4 py-3 text-right">Action</th>
                </tr>
            </thead>
        
            <tbody class="divide-y">
                @foreach ($rows as $row)
                    <tr>
                        <!-- Service -->
                        <td class="px-4 py-3 font-medium">
                            {{ $row['service'] }}
                        </td>
        
                        <!-- Packages & Care Levels -->
                        <td class="px-4 py-3">
                            @foreach ($row["packages"] as $pkg)
                                <div class="mb-3">
                                    <p class="font-semibold">{{ $pkg['package'] }}</p>
        
                                    @foreach ($pkg["care_levels"] as $cl)
                                        <ul class="ml-4">
                                            •<span class="font-medium">{{ $cl['care_level'] }}:</span>
                                            
                                            <!-- Format multiple hours/prices -->
                                            {{ implode(' • ', array_map(fn($t) => "($t)", $cl['time_prices'])) }}
                                        </ul>
                                    @endforeach
                                </div>
                            @endforeach
                        </td>
        
                        <!-- Action -->
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('edit.service.price', $row['serviceId']) }}"
                                class="rounded bg-blue-600 px-3 py-1 text-xs text-white">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    <!-- Table Container -->
    <div class="rounded-md border border-transparent bg-white p-5 shadow dark:border-gray-700/25 dark:bg-[#132337]">
        <div class="mb-4 flex flex-col items-center justify-between gap-y-3 sm:flex-row">
            <div class="flex items-center text-sm text-gray-700 dark:text-gray-400">
                <label for="rowsPerPage" class="mr-2">Show</label>
                <select id="rowsPerPage" wire:model.live="form.rowsPerPage"
                    class="rounded-md border border-gray-200 p-2 text-sm transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:focus:border-blue-600">
                    <option value="20">20</option>
                    <option value="35">35</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="ml-2">entries</span>
            </div>
            <div class="relative w-full sm:w-auto">
                <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 transform text-gray-600"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input type="search" wire:model.live='form.search' id="search"
                    class="w-full rounded-md border border-gray-200 py-2 pl-10 pr-3.5 text-[13px] text-gray-700 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-400 dark:focus:border-blue-600"
                    placeholder="Search...">
            </div>
        </div>
        <div class="overflow-x-auto">
            <table
                class="min-w-full divide-y divide-gray-200 text-sm text-gray-700 dark:divide-[#233A57] dark:text-gray-400">
                <thead class="bg-white dark:bg-[#132337]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            #
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Packages & Care Levels
                        </th>
                        @if (auth()->user()->can("edit advisor") || auth()->user()->can("delete advisor"))
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Action
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white dark:divide-[#233A57] dark:bg-[#132337]">
                    @forelse ($rows as $index => $row)
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $services->firstItem() + $index }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $row["service"] }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                @if (empty($row["packages"]))
                                    <span class="text-gray-500">N/A</span>
                                @else
                                    @foreach ($row["packages"] as $pkg)
                                        <div class="mb-3">
                            
                                            <p class="font-semibold">{{ $pkg["package"] }}</p>
                            
                                            {{-- If no care levels --}}
                                            @if (empty($pkg["care_levels"]))
                                                <p class="ml-4 text-gray-500">N/A</p>
                                            @else
                                                @foreach ($pkg["care_levels"] as $cl)
                                                    <ul class="ml-4">
                                                        • <span class="font-medium">{{ $cl["care_level"] }}:</span>
                            
                                                        {{-- If no time/price --}}
                                                        @if (!empty($cl["time_prices"]))
                                                            {{ implode(" • ", array_map(fn($t) => "($t)", $cl["time_prices"])) }}
                                                        @else
                                                            <span class="text-gray-500">N/A</span>
                                                        @endif
                                                    </ul>
                                                @endforeach
                                            @endif
                            
                                        </div>
                                    @endforeach
                                @endif
                            </td>
                            

                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    @can("edit service")
                                        <a href="{{ route("edit.service.price", $row['serviceId']) }}" title="Edit">
                                            <!-- Edit Icon -->
                                            <svg class="h-5 w-5 text-gray-600 transition-colors duration-300 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="py-5 text-center text-red-500">No records found...</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4 flex flex-col items-center justify-between gap-y-3 sm:flex-row">

            <!-- Showing Entries Info -->
            <div>
                <p class="text-sm text-gray-700">
                    Showing <span>{{ $services->firstItem() }}</span> to
                    <span>{{ $services->lastItem() }}</span>
                    of <span>{{ $services->total() }}</span> entries
                </p>
            </div>
        
            <!-- Pagination Links -->
            <div>
                <nav class="relative z-0 inline-flex flex-wrap -space-x-px rounded-md bg-white text-sm font-medium text-gray-700 shadow-sm"
                    aria-label="Pagination">
        
                    <!-- Previous Button -->
                    @if ($services->onFirstPage())
                        <span
                            class="relative inline-flex cursor-not-allowed items-center rounded-l-md border border-gray-600/10 px-2 py-2 text-gray-400">
                            Previous
                        </span>
                    @else
                        <a href="#" wire:click.prevent="previousPage"
                            class="relative inline-flex items-center rounded-l-md border border-gray-600/10 px-2 py-2 hover:bg-gray-100">
                            Previous
                        </a>
                    @endif
        
                    <!-- Pagination Numbers -->
                    @foreach ($services->links()->elements[0] as $page => $url)
                        @if ($page == $services->currentPage())
                            <span
                                class="relative inline-flex items-center border border-gray-600/10 bg-blue-500 px-4 py-2 text-white">
                                {{ $page }}
                            </span>
                        @else
                            <a href="#" wire:click.prevent="gotoPage({{ $page }})"
                                class="relative inline-flex items-center border border-gray-600/10 px-4 py-2 hover:bg-gray-100">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
        
                    <!-- Next Button -->
                    @if ($services->hasMorePages())
                        <a href="#" wire:click.prevent="nextPage"
                            class="relative inline-flex items-center rounded-r-md border border-gray-600/10 px-2 py-2 hover:bg-gray-100">
                            Next
                        </a>
                    @else
                        <span
                            class="relative inline-flex cursor-not-allowed items-center rounded-r-md border border-gray-600/10 px-2 py-2 text-gray-400">
                            Next
                        </span>
                    @endif
                </nav>
            </div>
        </div>
        
    </div>

   
    
</div>
