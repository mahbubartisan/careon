<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Doctor Visit Bookings
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Doctor Visit Bookings</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->

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
                            Booking ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Created By
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Patient Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Phone
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Date & Time
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white dark:divide-[#233A57] dark:bg-[#132337]">
                    @forelse ($bookings as $index => $booking)
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">#{{ $booking->booking_id }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ @$booking->user?->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $booking->patient_name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $booking->phone }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $booking->email }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ \Carbon\Carbon::parse($booking->appointment_date)->format("F j, Y") }} •
                                {{ \Carbon\Carbon::parse($booking->appointment_time)->format("g:i A") }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    @can("doctor visit booking detail")
                                        <a href="{{ route("visit.booking.detail", $booking->id) }}" title="View">
                                            <!-- View Icon -->
                                            <svg class="h-5 w-5 text-gray-600 transition-colors duration-300 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path
                                                    d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                                <circle cx="12" cy="12" r="3" />
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
                <p class="text-sm text-gray-700 dark:text-gray-700">
                    Showing <span>{{ $bookings->firstItem() }}</span> to
                    <span>{{ $bookings->lastItem() }}</span>
                    of <span>{{ $bookings->total() }}</span> entries
                </p>
            </div>

            <!-- Pagination Links -->
            <div>
                <nav class="relative z-0 inline-flex flex-wrap -space-x-px rounded-md bg-white text-sm font-medium text-gray-700 shadow-sm dark:bg-gray-800 dark:text-gray-700"
                    aria-label="Pagination">

                    <!-- Previous Button -->
                    @if ($bookings->onFirstPage())
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
                    @foreach ($bookings->links()->elements[0] as $page => $url)
                        @if ($page == $bookings->currentPage())
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
                    @if ($bookings->hasMorePages())
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
