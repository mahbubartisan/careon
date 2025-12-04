<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Blogs
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Blogs</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->
    <div class="my-9 flex justify-end">
        @can("create blog")
            <a href="{{ route("create.blog") }}"
                class="inline-flex items-center justify-center rounded-md bg-blue-500 px-3.5 py-2.5 text-sm text-white shadow-lg transition-colors duration-500 hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="mr-2 h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Add Blog
            </a>
        @endcan
    </div>

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
                            Image
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Published At
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Status
                        </th>
                        @if (auth()->user()->can("edit blog") || auth()->user()->can("delete blog"))
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Action
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white dark:divide-[#233A57] dark:bg-[#132337]">
                    @forelse ($blogs as $index => $blog)
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">{{ $blogs->firstItem() + $index }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <img src="{{ asset(@$blog->media?->path) }}" alt="{{ $blog->title }}"
                                    class="h-12 w-12 rounded-full border border-gray-300 object-cover" />
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $blog->title }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $blog->created_at->format('d M, Y') }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <label class="inline-flex cursor-pointer items-center">
                                    <input type="checkbox" wire:click="toggleStatus({{ $blog->id }})"
                                        @checked($blog->status == 1) class="peer sr-only">

                                    <div
                                        class="peer relative h-6 w-11 rounded-full bg-gray-300 after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-500 peer-checked:after:translate-x-full peer-focus:outline-none">
                                    </div>
                                </label>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    @can("edit blog")
                                        <a href="{{ route("edit.blog", $blog->id) }}" title="Edit">
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
                                    @can("delete blog")
                                        <button type="button" wire:click="delete({{ $blog->id }})"
                                            wire:confirm='Are you sure to delete?' title="Delete">
                                            <!-- Delete Icon -->
                                            <svg class="h-5 w-5 text-gray-600 transition-colors duration-300 hover:text-red-600 dark:text-gray-300 dark:hover:text-red-600"
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
                            <td colspan="12" class="py-5 text-center text-red-500">No records found...</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4 flex flex-col items-center justify-between gap-y-3 sm:flex-row">
            <!-- Showing Entries Info -->
            <div>
                <p class="text-sm text-gray-700 dark:text-gray-700">
                    Showing <span>{{ $blogs->firstItem() }}</span> to
                    <span>{{ $blogs->lastItem() }}</span>
                    of <span>{{ $blogs->total() }}</span> entries
                </p>
            </div>

            <!-- Pagination Links -->
            <div>
                <nav class="relative z-0 inline-flex flex-wrap -space-x-px rounded-md bg-white text-sm font-medium text-gray-700 shadow-sm dark:bg-gray-800 dark:text-gray-700"
                    aria-label="Pagination">

                    <!-- Previous Button -->
                    @if ($blogs->onFirstPage())
                        <span
                            class="relative inline-flex cursor-not-allowed items-center rounded-l-md border border-gray-600/10 px-2 py-2 text-gray-400 dark:border-gray-600/45">
                            <span>Previous</span>
                        </span>
                    @else
                        <a href="#" wire:click.prevent="previousPage"
                            class="relative inline-flex items-center rounded-l-md border border-gray-600/10 px-2 py-2 hover:bg-gray-100 dark:border-gray-600/45 dark:hover:bg-gray-700">
                            <span>Previous</span>
                        </a>
                    @endif

                    <!-- Pagination Numbers -->
                    @foreach ($blogs->links()->elements[0] as $page => $url)
                        @if ($page == $blogs->currentPage())
                            <span
                                class="relative inline-flex items-center border border-gray-600/10 bg-blue-500 px-4 py-2 text-white dark:border-gray-600/45">
                                {{ $page }}
                            </span>
                        @else
                            <a href="#" wire:click.prevent="gotoPage({{ $page }})"
                                class="relative inline-flex items-center border border-gray-600/10 px-4 py-2 hover:bg-gray-100 dark:border-gray-600/45 dark:hover:bg-gray-700">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    <!-- Next Button -->
                    @if ($blogs->hasMorePages())
                        <a href="#" wire:click.prevent="nextPage"
                            class="relative inline-flex items-center rounded-r-md border border-gray-600/10 px-2 py-2 hover:bg-gray-100 dark:border-gray-600/45 dark:hover:bg-gray-700">
                            <span>Next</span>
                        </a>
                    @else
                        <span
                            class="relative inline-flex cursor-not-allowed items-center rounded-r-md border border-gray-600/10 px-2 py-2 text-gray-400 dark:border-gray-600/45">
                            <span>Next</span>
                        </span>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</div>
