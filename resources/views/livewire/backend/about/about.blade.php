<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            About Us
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">About Us</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->
    {{-- <div class="my-5 flex justify-end">
        @can("create about")
            <a href="{{ route("create.about") }}"
                class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 px-3.5 py-2.5 rounded-md shadow-lg text-white text-sm transition-colors duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-5 w-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Add About
            </a>
        @endcan
    </div> --}}

    <!-- Table Container -->
    <div class="bg-white dark:bg-[#132337] rounded-md shadow p-5 border border-transparent dark:border-gray-700/25">
        <div class="overflow-x-auto">
            <table
                class="min-w-full divide-y divide-gray-200 dark:divide-[#233A57] text-sm text-gray-700 dark:text-gray-400">
                <thead class="bg-white dark:bg-[#132337]">
                    <tr>
                        <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">
                            Image
                        </th>
                        <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">
                            Established
                        </th>
                        <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">
                            Location
                        </th>
                        <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">
                            PLayers
                        </th>
                        <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">
                            Contact
                        </th>
                        <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">
                            Years
                        </th>
                        @if (auth()->user()->can("edit faq"))
                            <th class="px-6 py-3 text-xs text-left font-medium uppercase tracking-wider">
                                Action
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-[#132337] divide-y divide-gray-200 dark:divide-[#233A57]">
                    @forelse ($abouts as $index => $about)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ asset(@$about->media?->path) }}" alt="{{ @$about->media?->name }}"
                                    class="w-12 h-12 object-cover rounded-full border border-gray-300" />
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ \Carbon\Carbon::parse($about->established)->format("F d, Y") }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $about->location }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ number_format($about->players) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $about->contact }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $about->years }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-2">
                                    @can("edit about")
                                        <a href="{{ route("edit.about", $about->id) }}" title="Edit">
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
    </div>
</div>
