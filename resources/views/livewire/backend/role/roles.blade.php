<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Roles
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" wire:navigate
                        href="{{ route("dashboard") }}">Dashboard /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Roles</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->
    <div class="my-5 flex justify-end">
        @can("create role")
            <a wire:navigate href="{{ route("create.role") }}"
                class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 px-3.5 py-2.5 rounded-md shadow-lg text-white text-sm transition-colors duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-5 w-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Add Role
            </a>
        @endcan
    </div>
    <!-- Content header End -->

    <!-- Table Container -->
    <div class="bg-white dark:bg-[#132337] rounded-md shadow p-5 border border-transparent dark:border-gray-700/25">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-y-3 mb-4">
            <div class="flex items-center text-gray-700 text-sm dark:text-gray-400">
                <label for="rowsPerPage" class="mr-2">Show</label>
                <select id="rowsPerPage" wire:model.live="rowsPerPage"
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
                <input type="search" wire:model.live='search' id="search"
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
                        <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">
                            Permissions
                        </th>
                        <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">
                            Created At
                        </th>
                        @if (auth()->user()->can("edit role") || auth()->user()->can("delete role"))
                            <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">
                                Action
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-[#132337] divide-y divide-gray-200 dark:divide-[#233A57]">
                    @forelse ($roles as $index => $role)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $roles->firstItem() + $index }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($role->name) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @foreach (@$role->permissions as $permission)
                                    <span
                                        class="bg-blue-50 text-blue-600 px-2 py-1 rounded">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $role->created_at->format("d M Y h:s:i A") }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-2">
                                    @can("edit role")
                                        <a wire:navigate href="{{ route("edit.role", $role->id) }}" title="Edit">
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
                                        </a>
                                    @endcan
                                    @can("delete role")
                                        <button type="button" wire:click='delete({{ $role->id }})'
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
                    Showing <span>{{ $roles->firstItem() }}</span> to <span>{{ $roles->lastItem() }}</span>
                    of <span>{{ $roles->total() }}</span> entries
                </p>
            </div>

            <!-- Pagination Links -->
            <div>
                <nav class="relative z-0 inline-flex flex-wrap bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-700 rounded-md shadow-sm -space-x-px"
                    aria-label="Pagination">

                    <!-- Previous Button -->
                    @if ($roles->onFirstPage())
                        <span
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-600/10 dark:border-gray-600/45 text-gray-400 cursor-not-allowed">
                            <span>Previous</span>
                        </span>
                    @else
                        <a href="#" wire:click.prevent="previousPage"
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-600/10 dark:border-gray-600/45 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <span>Previous</span>
                        </a>
                    @endif

                    <!-- Pagination Numbers -->
                    @foreach ($roles->links()->elements[0] as $page => $url)
                        @if ($page == $roles->currentPage())
                            <span
                                class="relative inline-flex items-center px-4 py-2 border border-gray-600/10 dark:border-gray-600/45 bg-blue-500 text-white">
                                {{ $page }}
                            </span>
                        @else
                            <a href="#" wire:click.prevent="gotoPage({{ $page }})"
                                class="relative inline-flex items-center px-4 py-2 border border-gray-600/10 dark:border-gray-600/45 hover:bg-gray-100 dark:hover:bg-gray-700">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    <!-- Next Button -->
                    @if ($roles->hasMorePages())
                        <a href="#" wire:click.prevent="nextPage"
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-600/10 dark:border-gray-600/45 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <span>Next</span>
                        </a>
                    @else
                        <span
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-600/10 dark:border-gray-600/45 text-gray-400 cursor-not-allowed">
                            <span>Next</span>
                        </span>
                    @endif
                </nav>
            </div>
        </div>
    </div>

</div>
