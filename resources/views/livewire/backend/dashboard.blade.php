<div>
    <!-- Content header -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl">
            Dashboard
        </h2>
    </div>

    {{-- <div class="mt-6">
        <!-- card sections here -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Players -->
            <div class="flex flex-col items-center justify-center bg-white dark:bg-[#132337] rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-center w-12 h-12 bg-indigo-600 text-white rounded-full">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0">
                        </path>
                    </svg>
                </div>
                <p class="text-xl font-medium mt-3">{{ $totalPlayers }}</p>
                <p class="text-gray-500 text-sm">Players</p>
            </div>

            <!-- Teams -->
            <div class="flex flex-col items-center justify-center bg-white dark:bg-[#132337] rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-center w-12 h-12 bg-yellow-600 text-white rounded-full">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 7h10v10h-10z" />
                        <path d="M6 10h4" />
                        <path d="M8 10v4" />
                        <path d="M8.104 17c.47 2.274 2.483 4 4.896 4a5 5 0 0 0 5 -5v-7h-5" />
                        <path d="M18 18a4 4 0 0 0 4 -4v-5h-4" />
                        <path d="M13.003 8.83a3 3 0 1 0 -1.833 -1.833" />
                        <path d="M15.83 8.36a2.5 2.5 0 1 0 .594 -4.117" />
                    </svg>
                </div>
                <p class="text-xl font-medium mt-3">{{ $totalTeams }}</p>
                <p class="text-gray-500 text-sm">Teams</p>
            </div>

            <!-- Tournaments -->
            <div class="flex flex-col items-center justify-center bg-white dark:bg-[#132337] rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-center w-12 h-12 bg-emerald-600 text-white rounded-full">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M15 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M6 15v-1a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v1" />
                        <path d="M12 9l0 3" />
                    </svg>
                </div>
                <p class="text-xl font-medium mt-3">{{ $totalTournaments }}</p>
                <p class="text-gray-500 text-sm">Tournaments</p>
            </div>

            <!-- Matches -->
            <div class="flex flex-col items-center justify-center bg-white dark:bg-[#132337] rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-center w-12 h-12 bg-violet-600 text-white rounded-full">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M2 12c0 5.523 4.477 10 10 10s10 -4.477 10 -10s-4.477 -10 -10 -10s-10 4.477 -10 10" />
                        <path
                            d="M14 14.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75" />
                        <path d="M7 9l2 6l2 -6" />
                    </svg>
                </div>
                <p class="text-xl font-medium mt-3">{{ $totalMatches }}</p>
                <p class="text-gray-500 text-sm">Matches</p>
            </div>

            <!-- News -->
            <div class="flex flex-col items-center justify-center bg-white dark:bg-[#132337] rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-center w-12 h-12 bg-sky-600 text-white rounded-full">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" />
                        <path d="M8 8l4 0" />
                        <path d="M8 12l4 0" />
                        <path d="M8 16l4 0" />
                    </svg>
                </div>
                <p class="text-xl font-medium mt-3">{{ $totalNews }}</p>
                <p class="text-gray-500 text-sm">News</p>
            </div>

            <!-- Sponsors -->
            <div class="flex flex-col items-center justify-center bg-white dark:bg-[#132337] rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-center w-12 h-12 bg-lime-600 text-white rounded-full">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        <path
                            d="M12 6l-3.293 3.293a1 1 0 0 0 0 1.414l.543 .543c.69 .69 1.81 .69 2.5 0l1 -1a3.182 3.182 0 0 1 4.5 0l2.25 2.25" />
                        <path d="M12.5 15.5l2 2" />
                        <path d="M15 13l2 2" />
                    </svg>
                </div>
                <p class="text-xl font-medium mt-3">{{ $totalSponsors }}</p>
                <p class="text-gray-500 text-sm">Sponsors</p>
            </div>

            <!-- Districts -->
            <div class="flex flex-col items-center justify-center bg-white dark:bg-[#132337] rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-center w-12 h-12 bg-amber-600 text-white rounded-full">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5" />
                        <path d="M9 4v13" />
                        <path d="M15 7v5.5" />
                        <path
                            d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" />
                        <path d="M19 18v.01" />
                    </svg>
                </div>
                <p class="text-xl font-medium mt-3">{{ $totalDistricts }}</p>
                <p class="text-gray-500 text-sm">Districts</p>
            </div>

            <!-- Thana -->
            <div class="flex flex-col items-center justify-center bg-white dark:bg-[#132337] rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-center w-12 h-12 bg-teal-600 text-white rounded-full">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"
                        >
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                        <path d="M13 7l0 .01" />
                        <path d="M17 7l0 .01" />
                        <path d="M17 11l0 .01" />
                        <path d="M17 15l0 .01" />
                    </svg>
                </div>
                <p class="text-xl font-medium mt-3">{{ $totalThanas }}</p>
                <p class="text-gray-500 text-sm">Thana</p>
            </div>
        </div>
    </div> --}}
</div>
