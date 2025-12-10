<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Profile
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200"
                      wire:navigate  href="{{ route("dashboard") }}">Dashboard /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Profile</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
                <h2 class="text-[15px] text-gray-900 dark:text-gray-300 font-medium mb-4">Personal Information</h2>
                <form wire:submit.prevent="updateProfile" method="post" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm text-gray-700 dark:text-gray-400">
                            Name
                        </label>
                        <input type="text" wire:model="name" id="name" name="name" placeholder="Enter Name"
                            class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                        @error("name")
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm text-gray-700 dark:text-gray-400">
                            Email
                        </label>
                        <input type="email" wire:model="email" id="email" name="email" placeholder="Enter Email"
                            class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                        @error("email")
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div x-data="{ showPassword: false }">
                        <label for="password" class="block text-sm text-gray-700 dark:text-gray-400">
                            Password
                        </label>
                        <div class="relative">
                            <input :type="showPassword ? 'text' : 'password'" wire:model="password" id="password"
                                name="password" placeholder="Enter Password"
                                class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />

                            <!-- Toggle Button -->
                            <button type="button" @click="showPassword = !showPassword"
                                class="absolute right-3 top-7 transform -translate-y-1/2">
                                <svg x-show="!showPassword" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" style="display: none">
                                    <path
                                        d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24" />
                                    <line x1="1" y1="1" x2="23" y2="23" />
                                </svg>
                                <svg x-show="showPassword" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" style="display: none">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                        @error("password")
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Update Button -->
                    <div class="flex justify-end space-x-3 mt-5">
                        <button type="submit"
                            class="flex items-center justify-center w-full px-5 py-3 text-sm leading-5 text-white transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 rounded-md sm:w-auto sm:px-4 sm:py-2 focus:outline-none">
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
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
                <h2 class="text-[15px] text-gray-900 dark:text-gray-300 font-medium mb-4">Your Photo</h2>
                <form wire:submit.prevent="uploadPhoto" method="post" class="space-y-4">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="h-12 w-12 rounded-full">
                           <img src="{{ asset(auth()->user()->media?->path ?? 'images/user_profile.webp') }}"
                                    alt="{{ auth()->user()->media?->name }}" class="rounded-full object-fill">
                        </div>
                        <div>
                            <span class="mb-1.5 text-sm font-medium text-gray-700 dark:text-gray-400">Edit your photo</span>
                        </div>
                    </div>
                    <div id="FileUpload"
                        class="relative mb-5 block w-full cursor-pointer appearance-none rounded border border-dashed bg-gray px-4 py-4 dark:border-[#233A57] sm:py-7.5">
                        <input type="file" wire:model='photo' id="photo" accept="image/*"
                            class="absolute inset-0 z-50 m-0 h-full w-full cursor-pointer p-0 opacity-0 outline-none">
                        <div class="flex flex-col items-center justify-center space-y-3">
                            <span
                                class="flex h-10 w-10 items-center justify-center rounded-full border border-stroke bg-white">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.99967 9.33337C2.36786 9.33337 2.66634 9.63185 2.66634 10V12.6667C2.66634 12.8435 2.73658 13.0131 2.8616 13.1381C2.98663 13.2631 3.1562 13.3334 3.33301 13.3334H12.6663C12.8431 13.3334 13.0127 13.2631 13.1377 13.1381C13.2628 13.0131 13.333 12.8435 13.333 12.6667V10C13.333 9.63185 13.6315 9.33337 13.9997 9.33337C14.3679 9.33337 14.6663 9.63185 14.6663 10V12.6667C14.6663 13.1971 14.4556 13.7058 14.0806 14.0809C13.7055 14.456 13.1968 14.6667 12.6663 14.6667H3.33301C2.80257 14.6667 2.29387 14.456 1.91879 14.0809C1.54372 13.7058 1.33301 13.1971 1.33301 12.6667V10C1.33301 9.63185 1.63148 9.33337 1.99967 9.33337Z"
                                        fill="#3C50E0"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.5286 1.52864C7.78894 1.26829 8.21106 1.26829 8.4714 1.52864L11.8047 4.86197C12.0651 5.12232 12.0651 5.54443 11.8047 5.80478C11.5444 6.06513 11.1223 6.06513 10.8619 5.80478L8 2.94285L5.13807 5.80478C4.87772 6.06513 4.45561 6.06513 4.19526 5.80478C3.93491 5.54443 3.93491 5.12232 4.19526 4.86197L7.5286 1.52864Z"
                                        fill="#3C50E0"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.99967 1.33337C8.36786 1.33337 8.66634 1.63185 8.66634 2.00004V10C8.66634 10.3682 8.36786 10.6667 7.99967 10.6667C7.63148 10.6667 7.33301 10.3682 7.33301 10V2.00004C7.33301 1.63185 7.63148 1.33337 7.99967 1.33337Z"
                                        fill="#3C50E0"></path>
                                </svg>
                            </span>
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                <span class="text-blue-500">Click to upload</span>
                            </p>
                            <p class="mt-1.5 text-sm font-medium text-gray-700 dark:text-gray-400">
                                PNG, JPG or JPEG
                            </p>
                        </div>
                    </div>
                    <!-- Create Button -->
                    <div class="flex justify-end space-x-3 mt-5">
                        <button type="submit"
                            class="flex items-center justify-center w-full px-5 py-3 text-sm leading-5 text-white transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 rounded-md sm:w-auto sm:px-4 sm:py-2 focus:outline-none">
                            <svg class="mr-2 h-5 w-5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M7 18a4.6 4.4 0 0 1 0 -9h0a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                                <polyline points="9 15 12 12 15 15" />
                                <line x1="12" y1="12" x2="12" y2="21" />
                            </svg>
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
