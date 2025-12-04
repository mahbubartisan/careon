<div>
    <div>
        <!-- Breadcrumb Start -->
        <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
                Service Type
            </h2>
            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                            /</a>
                    </li>
                    <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Service Type</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->
        <div class="my-9 flex justify-end">
            @can("create service type")
            <button type="button" wire:click='openModal'
                class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 px-3.5 py-2.5 rounded-md shadow-lg text-white text-sm transition-colors duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-5 w-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Add Service Type
            </button>
            @endcan
        </div>
        <!-- Content header End -->

        <!-- Table Container -->
        <div class="bg-white dark:bg-[#132337] rounded-md shadow p-5 border border-transparent dark:border-gray-700/25">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-y-3 mb-4">
                <div class="flex items-center text-gray-700 text-sm dark:text-gray-400">
                    <label for="rowsPerPage" class="mr-2">Show</label>
                    <select id="rowsPerPage" wire:model.live="form.rowsPerPage"
                        class="p-2 text-sm border border-gray-200 dark:border-[#233A57] dark:bg-[#132337] focus:outline-none focus:ring-0 focus:border-blue-600 rounded-md dark:focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="20">20</option>
                        <option value="35">35</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="ml-2">entries</span>
                </div>
                <div class="relative w-full sm:w-auto">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-600"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                    </svg>
                    <input type="search" wire:model.live='form.search' id="search"
                        class="w-full pl-10 pr-3.5 py-2 border border-gray-200 dark:border-[#233A57] dark:bg-[#132337] rounded-md text-[13px] text-gray-700 dark:text-gray-400 focus:ring-0 focus:outline-none focus:border-blue-600 dark:focus:border-blue-600 transition duration-300 ease-in-out"
                        placeholder="Search...">
                </div>
            </div>
            <div class="overflow-x-auto">
                <table
                    class="min-w-full divide-y divide-gray-200 dark:divide-[#233A57] text-sm text-gray-700 dark:text-gray-400">
                    <thead class="bg-white dark:bg-[#132337]">
                        <tr>
                            <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">#
                            </th>
                            <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">
                                Name
                            </th>
                            @if (auth()->user()->can("edit service type") || auth()->user()->can("delete service type"))
                            <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">
                                Action
                            </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-[#132337] divide-y divide-gray-200 dark:divide-[#233A57]">
                        @forelse ($serviceTypes as $index => $type)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $serviceTypes->firstItem() + $index }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $type->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-2">
                                    @can("edit service type")
                                    <button type="button" wire:click="edit({{ $type->id }})" title="Edit">
                                        <!-- Edit Icon -->
                                        <svg class="h-5 w-5 text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-600 transition-colors duration-300"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path
                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                    </button>
                                    @endcan
                                    @can("delete service type")
                                    <button type="button" wire:click='delete({{ $type->id }})'
                                        wire:confirm='Are you sure to delete?' title="Delete">
                                        <!-- Delete Icon -->
                                        <svg class="h-5 w-5 text-gray-600 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-600 transition-colors duration-300"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12" class="py-5 text-red-500 text-center">No records found...</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col sm:flex-row justify-between items-center gap-y-3 mt-4">
                <!-- Showing Entries Info -->
                <div>
                    <p class="text-sm text-gray-700 dark:text-gray-700">
                        Showing <span>{{ $serviceTypes->firstItem() }}</span> to <span>{{ $serviceTypes->lastItem() }}</span>
                        of <span>{{ $serviceTypes->total() }}</span> entries
                    </p>
                </div>

                <!-- Pagination Links -->
                <div>
                    <nav class="relative z-0 inline-flex flex-wrap bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-700 rounded-md shadow-sm -space-x-px"
                        aria-label="Pagination">

                        <!-- Previous Button -->
                        @if ($serviceTypes->onFirstPage())
                        <span
                            class="relative inline-flex items-center px-3 py-2 rounded-l-md border border-gray-600/10 dark:border-gray-600/45 text-gray-400 cursor-not-allowed">
                            Prev
                        </span>
                        @else
                        <a href="#" wire:click.prevent="previousPage"
                            class="relative inline-flex items-center px-3 py-2 rounded-l-md border border-gray-600/10 dark:border-gray-600/45 hover:bg-gray-100 dark:hover:bg-gray-700">
                            Prev
                        </a>
                        @endif

                        @php
                        $current = $serviceTypes->currentPage();
                        $last = $serviceTypes->lastPage();
                        @endphp

                        <!-- Always show first page -->
                        @if ($current > 2)
                        <a href="#" wire:click.prevent="gotoPage(1)"
                            class="relative inline-flex items-center justify-center px-4 py-2 border border-gray-600/10 dark:border-gray-600/45 hover:bg-gray-100 dark:hover:bg-gray-700">
                            1
                        </a>
                        @endif

                        <!-- Ellipsis before current window -->
                        @if ($current > 3)
                        <span
                            class="relative inline-flex items-center justify-center px-4 py-2 border border-gray-600/10 dark:border-gray-600/45 text-gray-500 select-none">
                            …
                        </span>
                        @endif

                        <!-- Current page - 1 -->
                        @if ($current > 1)
                        <a href="#" wire:click.prevent="gotoPage({{ $current - 1 }})"
                            class="relative inline-flex items-center justify-center px-4 py-2 border border-gray-600/10 dark:border-gray-600/45 hover:bg-gray-100 dark:hover:bg-gray-700">
                            {{ $current - 1 }}
                        </a>
                        @endif

                        <!-- -- Current page -->
                        <span
                            class="relative inline-flex items-center justify-center px-4 py-2 border border-gray-600/10 dark:border-gray-600/45 bg-blue-500 text-white">
                            {{ $current }}
                        </span>

                        <!-- Current page + 1 -->
                        @if ($current < $last)
                            <a href="#" wire:click.prevent="gotoPage({{ $current + 1 }})"
                            class="relative inline-flex items-center justify-center px-4 py-2 border border-gray-600/10 dark:border-gray-600/45 hover:bg-gray-100 dark:hover:bg-gray-700">
                            {{ $current + 1 }}
                            </a>
                            @endif

                            <!-- Ellipsis after current window -->
                            @if ($current < $last - 2)
                                <span
                                class="relative inline-flex items-center justify-center px-4 py-2 border border-gray-600/10 dark:border-gray-600/45 text-gray-500 select-none">
                                …
                                </span>
                                @endif

                                <!-- Always show last page -->
                                @if ($current < $last - 1)
                                    <a href="#" wire:click.prevent="gotoPage({{ $last }})"
                                    class="relative inline-flex items-center justify-center px-4 py-2 border border-gray-600/10 dark:border-gray-600/45 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    {{ $last }}
                                    </a>
                                    @endif

                                    <!-- Next Button -->
                                    @if ($serviceTypes->hasMorePages())
                                    <a href="#" wire:click.prevent="nextPage"
                                        class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-gray-600/10 dark:border-gray-600/45 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        Next
                                    </a>
                                    @else
                                    <span
                                        class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-gray-600/10 dark:border-gray-600/45 text-gray-400 cursor-not-allowed">
                                        Next
                                    </span>
                                    @endif
                    </nav>
                </div>
            </div>
        </div>

        @if ($form->isOpen)
        @include("livewire.backend.service.fragments.modal")
        @endif
    </div>

</div>