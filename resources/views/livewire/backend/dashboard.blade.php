<div>
    <!-- Content header -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl">
            Dashboard
        </h2>
    </div>

    <div class="mt-6">
        <!-- card sections here -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            <!-- Special Services -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-600 text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M19.5 13.572l-7.5 7.428l-2.896 -2.868m-6.117 -8.104a5 5 0 0 1 9.013 -3.022a5 5 0 1 1 7.5 6.572" />
                        <path d="M3 13h2l2 3l2 -6l1 3h3" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">0</p>
                <p class="text-sm text-gray-500">Special Services</p>
            </div>

            <!-- Medical Services -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-yellow-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 2 4 4" />
                        <path d="m17 7 3-3" />
                        <path d="M19 9 8.7 19.3c-1 1-2.5 1-3.4 0l-.6-.6c-1-1-1-2.5 0-3.4L15 5" />
                        <path d="m9 11 4 4" />
                        <path d="m5 19-3 3" />
                        <path d="m14 4 6 6" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">0</p>
                <p class="text-sm text-gray-500">Medical Services</p>
            </div>

            <!-- Health Tips -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M8 2v4"></path>
                        <path d="M12 2v4"></path>
                        <path d="M16 2v4"></path>
                        <rect width="16" height="18" x="4" y="4" rx="2"></rect>
                        <path d="M8 10h6"></path>
                        <path d="M8 14h8"></path>
                        <path d="M8 18h5"></path>
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">0</p>
                <p class="text-sm text-gray-500">Health Tips</p>
            </div>

            <!-- Packages -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-lime-600 text-white">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z" />
                        <path d="M12 22V12" />
                        <polyline points="3.29 7 12 12 20.71 7" />
                        <path d="m7.5 4.27 9 5.15" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">0</p>
                <p class="text-sm text-gray-500">Packages</p>
            </div>

            {{-- <!-- Matches -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 shadow-sm dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-violet-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M2 12c0 5.523 4.477 10 10 10s10 -4.477 10 -10s-4.477 -10 -10 -10s-10 4.477 -10 10" />
                        <path
                            d="M14 14.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75" />
                        <path d="M7 9l2 6l2 -6" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">2</p>
                <p class="text-sm text-gray-500">Locations</p>
            </div>

            <!-- News -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 shadow-sm dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-sky-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" />
                        <path d="M8 8l4 0" />
                        <path d="M8 12l4 0" />
                        <path d="M8 16l4 0" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">5</p>
                <p class="text-sm text-gray-500">Bookings</p>
            </div>

            <!-- Sponsors -->
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 shadow-sm dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-lime-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        <path
                            d="M12 6l-3.293 3.293a1 1 0 0 0 0 1.414l.543 .543c.69 .69 1.81 .69 2.5 0l1 -1a3.182 3.182 0 0 1 4.5 0l2.25 2.25" />
                        <path d="M12.5 15.5l2 2" />
                        <path d="M15 13l2 2" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">4</p>
                <p class="text-sm text-gray-500">Advisors</p>
            </div>
            <div class="flex flex-col items-center justify-center rounded-lg bg-white p-6 shadow-sm dark:bg-[#132337]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-lime-600 text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        <path
                            d="M12 6l-3.293 3.293a1 1 0 0 0 0 1.414l.543 .543c.69 .69 1.81 .69 2.5 0l1 -1a3.182 3.182 0 0 1 4.5 0l2.25 2.25" />
                        <path d="M12.5 15.5l2 2" />
                        <path d="M15 13l2 2" />
                    </svg>
                </div>
                <p class="mt-3 text-xl font-medium">4</p>
                <p class="text-sm text-gray-500">Advisors</p>
            </div> --}}
        </div>
    </div>
</div>
