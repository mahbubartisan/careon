<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Edit Settings
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200"
                        href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Edit Settings</li>
            </ol>
        </nav>
    </div>

    <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
        <h2 class="text-[15px] text-gray-900 dark:text-gray-300 font-medium mb-4">Edit Settings</h2>
        <form method="post">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                <!-- Site Name -->
                <div>
                    <label for="name" class="block text-sm text-gray-700 dark:text-gray-400">
                        Site Name*
                    </label>
                    <input type="text" wire:model="site_name" id="site_name" name="site_name"
                        placeholder="Enter Name"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("site_name")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm text-gray-700 dark:text-gray-400">
                        Email*
                    </label>
                    <input type="email" wire:model="email" id="email" name="email" placeholder="Enter Email"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("email")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- Logo & FavIcon -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                <!-- Site Logo -->
                <div>
                    <label for="logo" class="block text-sm text-gray-700 dark:text-gray-400">
                        Logo*
                    </label>
                    <input type="file" wire:model="logo" id="logo" name="logo"
                        class="w-full mt-2 px-4 py-[7px] bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("logo")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Fav Icon -->
                <div>
                    <label for="favIcon" class="block text-sm text-gray-700 dark:text-gray-400">
                        Fav Icon*
                    </label>
                    <input type="file" wire:model="favIcon" id="favIcon" name="favIcon"
                        class="w-full mt-2 px-4 py-[7px] bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("favIcon")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- Address & Phone -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm text-gray-700 dark:text-gray-400">
                        Address*
                    </label>
                    <input type="text" wire:model="address" id="address" name="address" placeholder="Enter Address"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("address")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm text-gray-700 dark:text-gray-400">
                        Phone*
                    </label>
                    <input type="text" wire:model="phone" id="phone" name="phone" placeholder="Enter Phone"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>
            </div>
            <!-- Office Hours -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                <!-- Office Hours -->
                <div>
                    <label for="office_hours" class="block text-sm text-gray-700 dark:text-gray-400">
                        Office Hours*
                    </label>
                    <input type="text" wire:model="office_hours" id="office_hours" placeholder="Enter Office Hours"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("office_hours")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Whatsapp -->
                <div>
                    <label for="whatsapp" class="block text-sm text-gray-700 dark:text-gray-400">
                        Whatsapp*
                    </label>
                    <input type="text" wire:model="whatsapp" id="whatsapp" placeholder="Enter Whatsapp"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>
            </div>
            <!-- Social Media -->
            <div class="grid grid-cols-3 gap-6 mt-6">
                <!-- Facebook -->
                <div>
                    <label for="facebook" class="block text-sm text-gray-700 dark:text-gray-400">
                        Facebook
                    </label>
                    <input type="text" wire:model="facebook" id="facebook" name="facebook"
                        placeholder="Enter Facebook URL"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>
                <!-- Twitter -->
                <div>
                    <label for="twitter" class="block text-sm text-gray-700 dark:text-gray-400">
                        Twitter
                    </label>
                    <input type="text" wire:model="twitter" id="twitter" name="twitter"
                        placeholder="Enter Twitter URL"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>
                <!-- Youtube -->
                <div>
                    <label for="youtube" class="block text-sm text-gray-700 dark:text-gray-400">
                        Youtube
                    </label>
                    <input type="text" wire:model="youtube" id="youtube" name="youtube"
                        placeholder="Enter Youtube URL"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>
            </div>
            <!-- Social Media -->
            <div class="grid grid-cols-2 gap-6 mt-6">
                <!-- Instagram -->
                <div>
                    <label for="instagram" class="block text-sm text-gray-700 dark:text-gray-400">
                        Instagram
                    </label>
                    <input type="text" wire:model="instagram" id="instagram" name="instagram" placeholder="Enter Instagram URL"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>
                <!-- LinkedIn -->
                <div>
                    <label for="linkedin" class="block text-sm text-gray-700 dark:text-gray-400">
                        LinkedIn
                    </label>
                    <input type="text" wire:model="linkedin" id="instagram" name="instagram"
                        placeholder="Enter LinkedIn URL"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>
            </div>
            <!-- Create Button -->
            <div class="flex justify-end space-x-3 mt-5">
                <button type="reset"
                    class="px-4 py-2.5 rounded-md text-sm text-red-500 hover:bg-red-100 transition-colors duration-300">
                    Reset
                </button>
                <button wire:click='update' type="button"
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
