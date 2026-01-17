@php
    $settings = App\Models\Settings::with("siteLogo")->first();
@endphp
<header
    class="sticky top-0 z-10 flex items-center justify-between border-b border-gray-200 bg-white px-3 py-2 dark:border-[#132337] dark:bg-[#132337] dark:shadow-2xl">
    <div class="flex">
        <!-- Left side -->
        <div x-data="{ isMobileMainMenuOpen: false }">
            <div class="flex items-center space-x-4">
                <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
                    x-transition:enter="transition transform ease-out duration-300"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition transform ease-in duration-300"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                    class="rounded border border-gray-700/20 p-1.5 text-blue-600 transition duration-300 ease-in-out focus:outline-none dark:text-blue-700 lg:hidden">
                    <span class="sr-only">Open main menu</span>
                    <span aria-hidden="true">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </span>
                </button>
                <!-- Dashboard Icon -->
                {{-- <a href="{{ route("dashboard") }}">
                    <button class="block sm:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 inline text-blue-600 dark:text-blue-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                        </svg>
                    </button>
                </a> --}}
            </div>

            <!-- Overlay to disable main content when side nav is open -->
            <div x-show="isMobileMainMenuOpen" @click="isMobileMainMenuOpen = false"
                x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-300"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-20 bg-black bg-opacity-50" style="display: none"></div>
            <!-- Add your menu here -->
            <div class="fixed inset-0 left-0 z-20 w-64 transform overflow-y-hidden bg-white p-3 transition-transform duration-300 ease-in-out hover:overflow-y-auto dark:bg-gray-800 lg:hidden"
                style="display: none" x-show="isMobileMainMenuOpen"
                x-transition:enter="transition transform ease-out duration-300"
                @click.away="isMobileMainMenuOpen = false" x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0" x-transition:leave="transition transform ease-in duration-300"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="menu-class">
                <!-- Menu content goes here -->
                <div class="flex items-center justify-center">
                    <a href="{{ route("dashboard") }}">
                        <div class="flex justify-center">
                            <img src="{{ asset(@$setting->siteLogo?->path) }}" alt="{{ @$setting->site_name }}"
                                class="h-full w-36 flex-shrink-0 object-fill" />
                        </div>
                    </a>
                </div>
                <!-- Sidebar links -->
                <nav aria-label="Main" class="flex-1 space-y-2 overflow-y-hidden px-2 py-4 hover:overflow-y-auto">
                    <!-- Dashboard -->
                    <div>
                        <a href="{{ route("dashboard") }}"
                            class="{{ request()->routeIs("dashboard") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                            <span aria-hidden="true">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                                </svg>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <!-- User -->
                    @canany(["view user", "create user", "edit user", "delete user"])
                        <div>
                            <a href="{{ route("user") }}"
                                class="{{ request()->routeIs("user") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                                <span aria-hidden="true">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                    </svg>
                                </span>
                                <span>Users</span>
                            </a>
                        </div>
                    @endcanany


                    <!-- Role -->
                    @canany(["view role", "create role", "edit role", "delete role", "view permission", "create
                        permission", "edit permission", "delete permission"])
                        <div x-data="{ open: {{ request()->routeIs("role", "permission", "create.role", "edit.role") ? "true" : "false" }} }">
                            <a href="#" @click.prevent="open = !open"
                                class="flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-600"
                                :class="open ||
                                    {{ request()->routeIs("role", "permission", "create.role", "edit.role") ? true : false }} ?
                                    'bg-blue-50 text-blue-600 dark:bg-[#233A57] dark:text-blue-600' :
                                    'text-gray-400 hover:text-blue-600'">
                                <span aria-hidden="true">
                                    <svg class="mr-1 h-5 w-5 transition-colors"
                                        :class="open ||
                                            {{ request()->routeIs("role", "permission", "create.role", "edit.role") ? true : false }} ?
                                            'text-blue-600' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4" />
                                        <path d="M14.5 5.5l4 4" />
                                        <path d="M12 8l-5 -5l-4 4l5 5" />
                                        <path d="M7 8l-1.5 1.5" />
                                        <path d="M16 12l5 5l-4 4l-5 -5" />
                                        <path d="M16 17l-1.5 1.5" />
                                    </svg>
                                </span>
                                <span class="ml-2"
                                    :class="open ||
                                        {{ request()->routeIs("role", "permission", "create.role", "edit.role") ? true : false }} ?
                                        'text-blue-600' :
                                        'text-gray-400 hover:text-blue-500 dark:text-gray-100'">
                                    Role & Permissions
                                </span>
                                <span aria-hidden="true" class="ml-auto">
                                    <svg class="h-3.5 w-3.5 transform transition-transform"
                                        :class="(open ||
                                            {{ request()->routeIs("role", "permission", "create.role", "edit.role") ? true : false }}
                                        ) ?
                                        'text-blue-600 rotate-180' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>

                            </a>
                            <div x-show="open" class="mt-2 space-y-2" role="menu" aria-label="Components"
                                style="display: none">
                                <ul class="ml-2">
                                    <!-- Role -->
                                    @canany(["view role", "create role", "edit role", "delete role"])
                                        <li
                                            class="{{ request()->routeIs("role", "create.role", "edit.role") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("role", "create.role", "edit.role") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("role") }}" @click="open = true"
                                                class="{{ request()->routeIs("role", "create.role", "edit.role") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Roles
                                            </a>
                                        </li>
                                    @endcanany
                                    <!-- Permission -->
                                    @canany(["view permission", "create permission", "edit permission", "delete
                                        permission"])
                                        <li
                                            class="{{ request()->routeIs("permission") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("permission") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("permission") }}" @click="open = true"
                                                class="{{ request()->routeIs("permission") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Permissions
                                            </a>
                                        </li>
                                    @endcanany
                                </ul>
                            </div>
                        </div>
                    @endcanany

                    <!-- Location Manage -->
                    @canany(["view location group", "create location group", "edit location group", "delete location
                        group", "view location", "create location", "edit location", "delete location"])
                        <div x-data="{ open: {{ request()->routeIs("location-group", "create.location-group", "edit.location-group", "location", "create.location", "edit.location") ? "true" : "false" }} }">
                            <a href="#" @click.prevent="open = !open"
                                class="flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-600"
                                :class="open ||
                                    {{ request()->routeIs("location-group", "create.location-group", "edit.location-group", "location", "create.location", "edit.location") ? true : false }} ?
                                    'bg-blue-50 text-blue-600 dark:bg-[#233A57] dark:text-blue-600' :
                                    'text-gray-400 hover:text-blue-600'">
                                <span aria-hidden="true">
                                    <svg class="mr-1 h-5 w-5 transition-colors"
                                        :class="open ||
                                            {{ request()->routeIs("location-group", "create.location-group", "edit.location-group", "location", "create.location", "edit.location") ? true : false }} ?
                                            'text-blue-600' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                    </svg>
                                </span>
                                <span class="ml-2"
                                    :class="open ||
                                        {{ request()->routeIs("location-group", "create.location-group", "edit.location-group", "location", "create.location", "edit.location") ? true : false }} ?
                                        'text-blue-600' :
                                        'text-gray-400 hover:text-blue-500 dark:text-gray-100'">
                                    Location Manage
                                </span>
                                <span aria-hidden="true" class="ml-auto">
                                    <svg class="h-3.5 w-3.5 transform transition-transform"
                                        :class="(open ||
                                            {{ request()->routeIs("location-group", "create.location-group", "edit.location-group", "location", "create.location", "edit.location") ? true : false }}
                                        ) ?
                                        'text-blue-600 rotate-180' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2" role="menu" aria-label="Components"
                                style="display: none">
                                <ul class="ml-2">
                                    <!-- Location Group -->
                                    @canany([
                                        "view location group",
                                        "create location group",
                                        "edit location group",
                                        "delete location
                                        group"
                                        ])
                                        <li
                                            class="{{ request()->routeIs("location-group", "create.location-group", "edit.location-group") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("location-group", "create.location-group", "edit.location-group") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("location-group") }}" @click="open = true"
                                                class="{{ request()->routeIs("location-group", "create.location-group", "edit.location-group") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Location Group
                                            </a>
                                        </li>
                                    @endcanany

                                    <!-- Location -->
                                    @canany(["view location", "create location", "edit location", "delete location"])
                                        <li
                                            class="{{ request()->routeIs("location", "create.location", "edit.location") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("location", "create.location", "edit.location") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("location") }}" @click="open = true"
                                                class="{{ request()->routeIs("location", "create.location", "edit.location") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Location
                                            </a>
                                        </li>
                                    @endcanany
                                </ul>
                            </div>
                        </div>
                    @endcanany

                    <!-- Package Manage -->
                    @canany([
                        "view package",
                        "create package",
                        "edit package",
                        "delete package",
                        "view care level",
                        "create care
                        level",
                        "edit care level",
                        "delete care level"
                        ])
                        <div x-data="{ open: {{ request()->routeIs("package", "create.package", "edit.package", "care-level", "create.care-level", "edit.care-level") ? "true" : "false" }} }">
                            <a href="#" @click.prevent="open = !open"
                                class="flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-600"
                                :class="open ||
                                    {{ request()->routeIs("package", "create.package", "edit.package", "care-level", "create.care-level", "edit.care-level") ? true : false }} ?
                                    'bg-blue-50 text-blue-600 dark:bg-[#233A57] dark:text-blue-600' :
                                    'text-gray-400 hover:text-blue-600'">
                                <span aria-hidden="true">
                                    <svg class="mr-1 h-5 w-5 transition-colors"
                                        :class="open ||
                                            {{ request()->routeIs("package", "create.package", "edit.package", "care-level", "create.care-level", "edit.care-level") ? true : false }} ?
                                            'text-blue-600' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-package-icon lucide-package">
                                        <path
                                            d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z" />
                                        <path d="M12 22V12" />
                                        <polyline points="3.29 7 12 12 20.71 7" />
                                        <path d="m7.5 4.27 9 5.15" />
                                    </svg>
                                </span>
                                <span class="ml-2"
                                    :class="open ||
                                        {{ request()->routeIs("package", "create.package", "edit.package", "care-level", "create.care-level", "edit.care-level") ? true : false }} ?
                                        'text-blue-600' :
                                        'text-gray-400 hover:text-blue-500 dark:text-gray-100'">
                                    Package Manage
                                </span>
                                <span aria-hidden="true" class="ml-auto">
                                    <svg class="h-3.5 w-3.5 transform transition-transform"
                                        :class="(open ||
                                            {{ request()->routeIs("package", "create.package", "edit.package", "care-level", "create.care-level", "edit.care-level") ? true : false }}
                                        ) ?
                                        'text-blue-600 rotate-180' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2" role="menu" aria-label="Components"
                                style="display: none">
                                <ul class="ml-2">
                                    <!-- Package -->
                                    @canany(["view package", "create package", "edit package", "delete package"])
                                        <li
                                            class="{{ request()->routeIs("package", "create.package", "edit.package") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("package", "create.package", "edit.package") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("package") }}" @click="open = true"
                                                class="{{ request()->routeIs("package", "create.package", "edit.package") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Package
                                            </a>
                                        </li>
                                    @endcanany

                                    <!-- Location -->
                                    @canany(["view care level", "create care level", "edit care level", "delete care
                                        level"])
                                        <li
                                            class="{{ request()->routeIs("care-level", "create.care-level", "edit.care-level") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("care-level", "create.care-level", "edit.care-level") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("care-level") }}" @click="open = true"
                                                class="{{ request()->routeIs("care-level", "create.care-level", "edit.care-level") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Care Level
                                            </a>
                                        </li>
                                    @endcanany
                                </ul>
                            </div>
                        </div>
                    @endcanany

                    <!-- Special Care Manage -->
                    @canany(["view service type", "create service type", "edit service type", "delete service type"])
                        <div x-data="{ open: {{ request()->routeIs("service-type", "service", "create.service", "edit.service", "service.price", "create.service.price", "edit.service.price") ? "true" : "false" }} }">
                            <a href="#" @click.prevent="open = !open"
                                class="flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-600"
                                :class="open ||
                                    {{ request()->routeIs("service-type", "service", "create.service", "edit.service", "service.price", "create.service.price", "edit.service.price") ? true : false }} ?
                                    'bg-blue-50 text-blue-600 dark:bg-[#233A57] dark:text-blue-600' :
                                    'text-gray-400 hover:text-blue-600'">
                                <span aria-hidden="true">

                                    <svg class="mr-1 h-5 w-5 transition-colors"
                                        :class="open ||
                                            {{ request()->routeIs("service-type", "service", "create.service", "edit.service", "service.price", "create.service.price", "edit.service.price") ? true : false }} ?
                                            'text-blue-600' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 13.572l-7.5 7.428l-2.896 -2.868m-6.117 -8.104a5 5 0 0 1 9.013 -3.022a5 5 0 1 1 7.5 6.572" />
                                        <path d="M3 13h2l2 3l2 -6l1 3h3" />
                                    </svg>
                                </span>
                                <span class="ml-2"
                                    :class="open ||
                                        {{ request()->routeIs("service-type", "service", "create.service", "edit.service", "service.price", "create.service.price", "edit.service.price") ? true : false }} ?
                                        'text-blue-600' :
                                        'text-gray-400 hover:text-blue-500 dark:text-gray-100'">
                                    Special Care Manage
                                </span>
                                <span aria-hidden="true" class="ml-auto">
                                    <svg class="h-3.5 w-3.5 transform transition-transform"
                                        :class="(open ||
                                            {{ request()->routeIs("service-type", "service", "create.service", "edit.service", "service.price", "create.service.price", "edit.service.price") ? true : false }}
                                        ) ?
                                        'text-blue-600 rotate-180' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2" role="menu" aria-label="Components"
                                style="display: none">
                                <ul class="ml-2">
                                    <!-- Service Type -->
                                    @canany([
                                        "view service type",
                                        "create service type",
                                        "edit service type",
                                        "delete service
                                        type"
                                        ])
                                        <li
                                            class="{{ request()->routeIs("service-type") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("service-type") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("service-type") }}" @click="open = true"
                                                class="{{ request()->routeIs("service-type") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Service Type
                                            </a>
                                        </li>
                                    @endcanany
                                    <!-- Special Care Service -->
                                    @canany(["view service", "create service", "edit service", "delete service"])
                                        <li
                                            class="{{ request()->routeIs("service", "create.service", "edit.service") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("service", "create.service", "edit.service") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("service") }}" @click="open = true"
                                                class="{{ request()->routeIs("service", "create.service", "edit.service") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Special Service
                                            </a>
                                        </li>
                                    @endcanany
                                    <!-- Special Care Service -->
                                    @canany([
                                        "view service price",
                                        "create service price",
                                        "edit service price",
                                        "delete service
                                        price"
                                        ])
                                        <li
                                            class="{{ request()->routeIs("service.price", "create.service.price", "edit.service.price") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("service.price", "create.service.price", "edit.service.price") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("service.price") }}" @click="open = true"
                                                class="{{ request()->routeIs("service.price", "create.service.price", "edit.service.price") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Service Price
                                            </a>
                                        </li>
                                    @endcanany
                                </ul>
                            </div>

                        </div>
                    @endcanany

                    <!-- Medical Care Manage -->
                    @canany([
                        "view medical service",
                        "create medical service",
                        "edit medical service",
                        "delete medical
                        service"
                        ])
                        <div x-data="{ open: {{ request()->routeIs("medical.service", "create.medical.service", "edit.medical.service") ? "true" : "false" }} }">
                            <a href="#" @click.prevent="open = !open"
                                class="flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-600"
                                :class="open ||
                                    {{ request()->routeIs("medical.service", "create.medical.service", "edit.medical.service") ? true : false }} ?
                                    'bg-blue-50 text-blue-600 dark:bg-[#233A57] dark:text-blue-600' :
                                    'text-gray-400 hover:text-blue-600'">
                                <span aria-hidden="true">
                                    <svg class="mr-1 h-5 w-5 transition-colors"
                                        :class="open ||
                                            {{ request()->routeIs("medical.service", "create.medical.service", "edit.medical.service") ? true : false }} ?
                                            'text-blue-600' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M14 2v6a2 2 0 0 0 .245.96l5.51 10.08A2 2 0 0 1 18 22H6a2 2 0 0 1-1.755-2.96l5.51-10.08A2 2 0 0 0 10 8V2" />
                                        <path d="M6.453 15h11.094" />
                                        <path d="M8.5 2h7" />
                                    </svg>
                                </span>
                                <span class="ml-2"
                                    :class="open ||
                                        {{ request()->routeIs("medical.service", "create.medical.service", "edit.medical.service") ? true : false }} ?
                                        'text-blue-600' :
                                        'text-gray-400 hover:text-blue-500 dark:text-gray-100'">
                                    Medical Care Manage
                                </span>
                                <span aria-hidden="true" class="ml-auto">
                                    <svg class="h-3.5 w-3.5 transform transition-transform"
                                        :class="(open ||
                                            {{ request()->routeIs("medical.service", "create.medical.service", "edit.medical.service") ? true : false }}
                                        ) ?
                                        'text-blue-600 rotate-180' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2" role="menu" aria-label="Components"
                                style="display: none">
                                <ul class="ml-2">
                                    <!-- Medical Service -->
                                    @canany([
                                        "view medical service",
                                        "create medical service",
                                        "edit medical service",
                                        "delete medical
                                        service"
                                        ])
                                        <li
                                            class="{{ request()->routeIs("medical.service", "create.medical.service", "edit.medical.service") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("medical.service", "create.medical.service", "edit.medical.service") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("medical.service") }}" @click="open = true"
                                                class="{{ request()->routeIs("medical.service", "create.medical.service", "edit.medical.service") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Medical Service
                                            </a>
                                        </li>
                                    @endcanany
                                </ul>
                            </div>

                        </div>
                    @endcanany

                    <!-- Booking Manage -->
                    @canany(["diagnostic booking", "diagnostic booking detail", "ambulance booking", "ambulance booking
                        detail", "consultation booking", "consultation booking detail", "doctor visit booking", "doctor
                        visit booking detail"])
                        <div x-data="{ open: {{ request()->routeIs("diagnostic.booking", "diagnostic.booking.detail", "ambulance.booking", "ambulance.booking.detail", "consultation.booking", "consultation.booking.detail", "visit.booking", "visit.booking.detail") ? "true" : "false" }} }">
                            <a href="#" @click.prevent="open = !open"
                                class="flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-600"
                                :class="open ||
                                    {{ request()->routeIs("diagnostic.booking", "diagnostic.booking.detail", "ambulance.booking", "ambulance.booking.detail", "consultation.booking", "consultation.booking.detail", "visit.booking", "visit.booking.detail") ? true : false }} ?
                                    'bg-blue-50 text-blue-600 dark:bg-[#233A57] dark:text-blue-600' :
                                    'text-gray-400 hover:text-blue-600'">
                                <span aria-hidden="true">
                                    <svg class="mr-1 h-5 w-5 transition-colors"
                                        :class="open ||
                                            {{ request()->routeIs("diagnostic.booking", "diagnostic.booking.detail", "ambulance.booking", "ambulance.booking.detail", "consultation.booking", "consultation.booking.detail", "visit.booking", "visit.booking.detail") ? true : false }} ?
                                            'text-blue-600' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M8 2v4" />
                                        <path d="M16 2v4" />
                                        <rect width="18" height="18" x="3" y="4" rx="2" />
                                        <path d="M3 10h18" />
                                        <path d="M8 14h.01" />
                                        <path d="M12 14h.01" />
                                        <path d="M16 14h.01" />
                                        <path d="M8 18h.01" />
                                        <path d="M12 18h.01" />
                                        <path d="M16 18h.01" />
                                    </svg>
                                </span>
                                <span class="ml-2"
                                    :class="open ||
                                        {{ request()->routeIs("diagnostic.booking", "diagnostic.booking.detail", "ambulance.booking", "ambulance.booking.detail", "consultation.booking", "consultation.booking.detail", "visit.booking", "visit.booking.detail") ? true : false }} ?
                                        'text-blue-600' :
                                        'text-gray-400 hover:text-blue-500 dark:text-gray-100'">
                                    Booking Manage
                                </span>
                                <span aria-hidden="true" class="ml-auto">
                                    <svg class="h-3.5 w-3.5 transform transition-transform"
                                        :class="(open ||
                                            {{ request()->routeIs("diagnostic.booking", "diagnostic.booking.detail", "ambulance.booking", "ambulance.booking.detail", "consultation.booking", "consultation.booking.detail", "visit.booking", "visit.booking.detail") ? true : false }}
                                        ) ?
                                        'text-blue-600 rotate-180' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2" role="menu" aria-label="Components"
                                style="display: none">
                                <ul class="ml-2">
                                    <!-- Diagnostic Service -->
                                    @canany(["diagnostic booking", "diagnostic booking detail"])
                                        <li
                                            class="{{ request()->routeIs("diagnostic.booking", "diagnostic.booking.detail") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("diagnostic.booking", "diagnostic.booking.detail") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("diagnostic.booking") }}" @click="open = true"
                                                class="{{ request()->routeIs("diagnostic.booking", "diagnostic.booking.detail") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Diagnostic Bookings
                                            </a>
                                        </li>
                                    @endcanany

                                    <!-- Ambulance Service -->
                                    @canany(["ambulance booking", "ambulance booking detail"])
                                        <li
                                            class="{{ request()->routeIs("ambulance.booking", "ambulance.booking.detail") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("ambulance.booking", "ambulance.booking.detail") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("ambulance.booking") }}" @click="open = true"
                                                class="{{ request()->routeIs("ambulance.booking", "ambulance.booking.detail") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Ambulance Bookings
                                            </a>
                                        </li>
                                    @endcanany

                                    <!-- Consultation Service -->
                                    @canany(["consultation booking", "consultation booking detail"])
                                        <li
                                            class="{{ request()->routeIs("consultation.booking", "consultation.booking.detail") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("consultation.booking", "consultation.booking.detail") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("consultation.booking") }}" @click="open = true"
                                                class="{{ request()->routeIs("consultation.booking", "consultation.booking.detail") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Consultation Bookings
                                            </a>
                                        </li>
                                    @endcanany

                                    <!-- Doctor Visit Service -->
                                    @canany(["doctor visit booking", "doctor visit booking detail"])
                                        <li
                                            class="{{ request()->routeIs("visit.booking", "visit.booking.detail") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("visit.booking", "visit.booking.detail") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("visit.booking") }}" @click="open = true"
                                                class="{{ request()->routeIs("visit.booking", "visit.booking.detail") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Doctor Visit Bookings
                                            </a>
                                        </li>
                                    @endcanany
                                </ul>
                            </div>

                        </div>
                    @endcanany

                    <!-- Booking -->
                    @canany(["view booking", "booking detail"])
                        <div>
                            <a href="{{ route("booking") }}"
                                class="{{ request()->routeIs("booking", "booking.detail") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                                <span aria-hidden="true">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M8 2v4" />
                                        <path d="M16 2v4" />
                                        <rect width="18" height="18" x="3" y="4" rx="2" />
                                        <path d="M3 10h18" />
                                        <path d="M8 14h.01" />
                                        <path d="M12 14h.01" />
                                        <path d="M16 14h.01" />
                                        <path d="M8 18h.01" />
                                        <path d="M12 18h.01" />
                                        <path d="M16 18h.01" />
                                    </svg>
                                </span>
                                <span>Special Care Bookings</span>
                            </a>
                        </div>
                    @endcanany



                    <!-- Contact Us -->
                    {{-- @canany(["view contact", "delete contact"])
            <div>
                <a href="{{ route("contact") }}"
                    class="flex items-center space-x-3 p-2 text-sm rounded-md dark:hover:text-blue-600
                        {{ request()->routeIs("contact", "view.contact") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }}">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
                            <path d="M10 16h6" />
                            <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M4 8h3" />
                            <path d="M4 12h3" />
                            <path d="M4 16h3" />
                        </svg>
                    </span>
                    <span>Contact Us</span>
                </a>
            </div>
            @endcanany --}}

                    <!-- About -->
                    {{-- @canany(["view about", "create about", "edit about"])
            <div>
                <a href="{{ route("about") }}"
                    class="flex items-center space-x-3 p-2 text-sm rounded-md dark:hover:text-blue-600
                        {{ request()->routeIs("about", "create.about", "edit.about") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }}">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M12 9v4" />
                            <path d="M12 16v.01" />
                        </svg>
                    </span>
                    <span>About</span>
                </a>
            </div>
            @endcanany --}}


                    <!-- Advisors -->
                    @canany(["view advisor", "create advisor", "edit advisor", "delete advisor"])
                        <div>
                            <a href="{{ route("advisor") }}"
                                class="{{ request()->routeIs("advisor", "create.advisor", "edit.advisor") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                                <span aria-hidden="true">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M18 21a8 8 0 0 0-16 0" />
                                        <circle cx="10" cy="8" r="5" />
                                        <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                                    </svg>
                                </span>
                                <span>Advisors</span>
                            </a>
                        </div>
                    @endcanany

                    <!-- Blogs -->
                    @canany(["view blog", "create blog", "edit blog", "delete blog"])
                        <div>
                            <a href="{{ route("blog") }}"
                                class="{{ request()->routeIs("blog", "create.blog", "edit.blog") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                                <span aria-hidden="true">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M8 2v4" />
                                        <path d="M12 2v4" />
                                        <path d="M16 2v4" />
                                        <rect width="16" height="18" x="4" y="4" rx="2" />
                                        <path d="M8 10h6" />
                                        <path d="M8 14h8" />
                                        <path d="M8 18h5" />
                                    </svg>
                                </span>
                                <span>Blogs</span>
                            </a>
                        </div>
                    @endcanany

                    <!-- Customer Support -->
                    {{-- @canany(["general query", "view general query", "feedback", "view feedback"])
                <div x-data="{ open: {{ request()->routeIs("general-query", "view.general-query", "feedback", "view.feedback") ? "true" : "false" }} }">
                    <a href="#" @click.prevent="open = !open"
                        class="flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-600"
                        :class="open ||
                            {{ request()->routeIs("general-query", "view.general-query", "feedback", "view.feedback") ? true : false }} ?
                            'bg-blue-50 text-blue-600 dark:bg-[#233A57] dark:text-blue-600' :
                            'text-gray-400 hover:text-blue-600'">
                        <span aria-hidden="true">
                            <svg class="mr-1 h-5 w-5 transition-colors"
                                :class="open ||
                                    {{ request()->routeIs("general-query", "view.general-query", "feedback", "view.feedback") ? true : false }} ?
                                    'text-blue-600' : 'text-gray-400 dark:text-gray-100'"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </span>
                        <span class="ml-2"
                            :class="open ||
                                {{ request()->routeIs("general-query", "view.general-query", "feedback", "view.feedback") ? true : false }} ?
                                'text-blue-600' :
                                'text-gray-400 hover:text-blue-500 dark:text-gray-100'">
                           Customer Support
                        </span>
                        <span aria-hidden="true" class="ml-auto">
                            <svg class="h-3.5 w-3.5 transform transition-transform"
                                :class="(open ||
                                    {{ request()->routeIs("general-query", "view.general-query", "feedback", "view.feedback") ? true : false }}
                                ) ?
                                'text-blue-600 rotate-180' : 'text-gray-400 dark:text-gray-100'"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>

                    </a>
                    <div x-show="open" class="mt-2 space-y-2" role="menu" aria-label="Components"
                        style="display: none">
                        <ul class="ml-2">
                            <!-- Lab -->
                            @canany(["general query", "view general query"])
                                <li
                                    class="{{ request()->routeIs("general-query", "view.general-query") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                    <span
                                        class="{{ request()->routeIs("general-query", "view.general-query") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                    </span>
                                    <a href="{{ route("general-query") }}" @click="open = true"
                                        class="{{ request()->routeIs("general-query", "view.general-query") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                        General Query
                                    </a>
                                </li>
                            @endcanany

                            <!-- Site Settings -->
                            @canany(["feedback", "view feedback"])
                                <li
                                    class="{{ request()->routeIs("feedback", "view.feedback") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                    <span
                                        class="{{ request()->routeIs("feedback", "view.feedback") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                    </span>
                                    <a href="{{ route("settings") }}" @click="open = true"
                                        class="{{ request()->routeIs("feedback", "view.feedback") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                        Feedback
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </div>
                </div>
            @endcanany --}}

                    <!-- Settings -->
                    @canany(["view settings", "create settings", "edit settings", "delete settings", "view lab", "create
                        lab", "edit lab", "delete lab"])
                        <div x-data="{ open: {{ request()->routeIs("settings", "create.settings", "edit.settings", "lab") ? "true" : "false" }} }">
                            <a href="#" @click.prevent="open = !open"
                                class="flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-600"
                                :class="open ||
                                    {{ request()->routeIs("settings", "create.settings", "edit.settings", "lab") ? true : false }} ?
                                    'bg-blue-50 text-blue-600 dark:bg-[#233A57] dark:text-blue-600' :
                                    'text-gray-400 hover:text-blue-600'">
                                <span aria-hidden="true">
                                    <svg class="mr-1 h-5 w-5 transition-colors"
                                        :class="open ||
                                            {{ request()->routeIs("settings", "create.settings", "edit.settings", "lab") ? true : false }} ?
                                            'text-blue-600' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </span>
                                <span class="ml-2"
                                    :class="open ||
                                        {{ request()->routeIs("settings", "create.settings", "edit.settings", "lab") ? true : false }} ?
                                        'text-blue-600' :
                                        'text-gray-400 hover:text-blue-500 dark:text-gray-100'">
                                    Settings
                                </span>
                                <span aria-hidden="true" class="ml-auto">
                                    <svg class="h-3.5 w-3.5 transform transition-transform"
                                        :class="(open ||
                                            {{ request()->routeIs("settings", "create.settings", "edit.settings", "lab") ? true : false }}
                                        ) ?
                                        'text-blue-600 rotate-180' : 'text-gray-400 dark:text-gray-100'"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>

                            </a>
                            <div x-show="open" class="mt-2 space-y-2" role="menu" aria-label="Components"
                                style="display: none">
                                <ul class="ml-2">
                                    <!-- Lab -->
                                    @canany(["view lab", "create lab", "edit lab", "delete lab"])
                                        <li
                                            class="{{ request()->routeIs("lab") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("lab") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("lab") }}" @click="open = true"
                                                class="{{ request()->routeIs("lab") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Labs
                                            </a>
                                        </li>
                                    @endcanany

                                    <!-- Site Settings -->
                                    @canany(["view settings", "create settings", "edit settings", "delete settings"])
                                        <li
                                            class="{{ request()->routeIs("settings", "create.settings", "edit.settings") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                            <span
                                                class="{{ request()->routeIs("settings", "create.settings", "edit.settings") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                            </span>
                                            <a href="{{ route("settings") }}" @click="open = true"
                                                class="{{ request()->routeIs("settings", "create.settings", "edit.settings") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                                Site Settings
                                            </a>
                                        </li>
                                    @endcanany
                                </ul>
                            </div>
                        </div>
                    @endcanany
                </nav>
            </div>
        </div>
    </div>
    <div class="relative flex items-center gap-x-4">

        <!--  Website Icon -->
        <a href="{{ url("/") }}" target="_blank" title="Visit Site"
            class="hidden text-gray-400 dark:text-white sm:block">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M19.5 7a9 9 0 0 0 -7.5 -4a8.991 8.991 0 0 0 -7.484 4" />
                <path d="M11.5 3a16.989 16.989 0 0 0 -1.826 4" />
                <path d="M12.5 3a16.989 16.989 0 0 1 1.828 4" />
                <path d="M19.5 17a9 9 0 0 1 -7.5 4a8.991 8.991 0 0 1 -7.484 -4" />
                <path d="M11.5 21a16.989 16.989 0 0 1 -1.826 -4" />
                <path d="M12.5 21a16.989 16.989 0 0 0 1.828 -4" />
                <path d="M2 10l1 4l1.5 -4l1.5 4l1 -4" />
                <path d="M17 10l1 4l1.5 -4l1.5 4l1 -4" />
                <path d="M9.5 10l1 4l1.5 -4l1.5 4l1 -4" />
            </svg>
        </a>

        <!-- Settings Icon -->
        @if (auth()->user()->can("view settings") ||
                auth()->user()->can("edit settings") ||
                auth()->user()->can("delete settings")
        )
            <a wire:navigate href="{{ route("settings") }}" title="Settings"
                class="hidden text-gray-500 dark:text-white sm:block">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                </svg>
            </a>
        @endif

        <!-- User avatar button -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })" type="button"
                aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                class="transition-opacity duration-300 focus:outline-none dark:opacity-75 dark:hover:opacity-100 dark:focus:opacity-100">
                <span class="sr-only">User menu</span>
                <div class="flex items-center gap-x-3">
                    <img src="{{ asset(auth()->user()->media?->path ?? "images/user_profile.webp") }}"
                        alt="{{ auth()->user()->media?->name }}"
                        class="h-10 w-10 flex-shrink-0 rounded-full object-fill">
                </div>
            </button>

            <!-- User dropdown menu -->
            <div x-show="open" x-ref="userMenu" x-transition:enter="transition-all transform ease-out"
                x-transition:enter-start="translate-y-1/2 opacity-0"
                x-transition:enter-end="translate-y-0 opacity-100"
                x-transition:leave="transition-all transform ease-in"
                x-transition:leave-start="translate-y-0 opacity-100"
                x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                @keydown.escape="open = false"
                class="absolute right-0 top-14 w-52 rounded-md bg-white py-1 shadow-lg focus:outline-none dark:bg-gray-800"
                tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu"
                style="display: none">
                <div class="px-4 py-4">
                    <p class="text-sm text-gray-500 dark:text-blue-200">Welcome Back!</p>
                    <div class="mt-3 flex items-center">
                        <img src="{{ asset(auth()->user()->media?->path ?? "images/user_profile.webp") }}"
                            alt="{{ auth()->user()->media?->name }}" class="h-10 w-10 rounded-full object-fill">
                        <div class="ml-3">
                            <h3 class="text-[15px] text-gray-700 dark:text-white">{{ auth()->user()->name }}
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-blue-200">
                                {{ auth()->user()->roles?->first()?->name }}</p>
                        </div>
                    </div>
                    <ul class="mt-4 space-y-3">
                        <li>
                            <a href="{{ route("profile") }}"
                                class="group flex items-center font-[400] text-gray-600 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-500">
                                <svg class="h-5 w-5 text-gray-500 group-hover:text-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="5" />
                                    <path d="M20 21a8 8 0 0 0-16 0" />
                                </svg>
                                <span class="ml-3 text-sm">Profile</span>
                            </a>
                        </li>
                        <li class="border-t border-gray-200 pt-3 dark:border-slate-700">
                            <form method="POST" action="{{ route("logout") }}">
                                @csrf
                                <button type="submit"
                                    class="group flex w-full items-center font-[400] text-gray-600 hover:text-red-500 dark:text-slate-400 dark:hover:text-red-500">
                                    <svg class="h-4 w-4 text-gray-500 group-hover:text-red-500" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                        <polyline points="16 17 21 12 16 7" />
                                        <line x1="21" y1="12" x2="9" y2="12" />
                                    </svg>
                                    <span class="ml-3 text-sm">Sign Out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
