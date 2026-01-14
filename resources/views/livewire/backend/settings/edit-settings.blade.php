<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Edit Settings
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Edit Settings</li>
            </ol>
        </nav>
    </div>

    <div class="rounded-md bg-white px-6 pb-3 pt-6 shadow dark:bg-[#132337]">
        <h2 class="mb-4 text-lg font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Settings Information
        </h2>
        <form method="post">
            <div class="space-y-4 rounded-xl border p-4">
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <!-- Site Name -->
                    <div>
                        <label for="name" class="block text-sm text-gray-700 dark:text-gray-400">
                            Site Name *
                        </label>
                        <input type="text" wire:model="site_name" id="site_name" name="site_name"
                            placeholder="Enter Name"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                        @error("site_name")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm text-gray-700 dark:text-gray-400">
                            Email *
                        </label>
                        <input type="email" wire:model="email" id="email" name="email" placeholder="Enter Email"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                        @error("email")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Logo & FavIcon -->
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <!-- Site Logo -->
                    <div>
                        <label for="logo" class="block text-sm text-gray-700 dark:text-gray-400">
                            Logo *
                        </label>
                        <input type="file" wire:model="logo" id="logo" name="logo"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-[7px] text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                        @error("logo")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Fav Icon -->
                    <div>
                        <label for="favIcon" class="block text-sm text-gray-700 dark:text-gray-400">
                            Fav Icon *
                        </label>
                        <input type="file" wire:model="favIcon" id="favIcon" name="favIcon"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-[7px] text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                        @error("favIcon")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Address & Phone -->
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm text-gray-700 dark:text-gray-400">
                            Address *
                        </label>
                        <input type="text" wire:model="address" id="address" name="address"
                            placeholder="Enter Address"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                        @error("address")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm text-gray-700 dark:text-gray-400">
                            Phone *
                        </label>
                        <input type="text" wire:model="phone" id="phone" name="phone" placeholder="Enter Phone"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    </div>
                </div>
                <!-- Office Hours -->
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <!-- Office Hours -->
                    <div>
                        <label for="office_hours" class="block text-sm text-gray-700 dark:text-gray-400">
                            Office Hours *
                        </label>
                        <input type="text" wire:model="office_hours" id="office_hours"
                            placeholder="Enter Office Hours"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                        @error("office_hours")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Whatsapp -->
                    <div>
                        <label for="whatsapp" class="block text-sm text-gray-700 dark:text-gray-400">
                            Whatsapp *
                        </label>
                        <input type="text" wire:model="whatsapp" id="whatsapp" placeholder="Enter Whatsapp"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    </div>
                </div>
                <!-- Social Media -->
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <!-- Facebook -->
                    <div>
                        <label for="facebook" class="block text-sm text-gray-700 dark:text-gray-400">
                            Facebook
                        </label>
                        <input type="text" wire:model="facebook" id="facebook" name="facebook"
                            placeholder="Enter Facebook URL"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    </div>
                    <!-- Twitter -->
                    <div>
                        <label for="twitter" class="block text-sm text-gray-700 dark:text-gray-400">
                            Twitter
                        </label>
                        <input type="text" wire:model="twitter" id="twitter" name="twitter"
                            placeholder="Enter Twitter URL"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    </div>
                    <!-- Youtube -->
                    <div>
                        <label for="youtube" class="block text-sm text-gray-700 dark:text-gray-400">
                            Youtube
                        </label>
                        <input type="text" wire:model="youtube" id="youtube" name="youtube"
                            placeholder="Enter Youtube URL"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    </div>
                </div>
                <!-- Social Media -->
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <!-- Instagram -->
                    <div>
                        <label for="instagram" class="block text-sm text-gray-700 dark:text-gray-400">
                            Instagram
                        </label>
                        <input type="text" wire:model="instagram" id="instagram" name="instagram"
                            placeholder="Enter Instagram URL"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    </div>
                    <!-- LinkedIn -->
                    <div>
                        <label for="linkedin" class="block text-sm text-gray-700 dark:text-gray-400">
                            LinkedIn
                        </label>
                        <input type="text" wire:model="linkedin" id="instagram" name="instagram"
                            placeholder="Enter LinkedIn URL"
                            class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    </div>
                </div>

                <!-- Meta Title -->
                <div>
                    <label for="meta_title" class="block text-sm text-gray-700 dark:text-gray-400">
                        Meta Title
                    </label>
                    <input type="text" wire:model="meta_title" id="meta_title" placeholder="Enter Meta Title"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                </div>

                <!-- Meta Description -->
                <div>
                    <label for="meta_description" class="block text-sm text-gray-700 dark:text-gray-400">
                        Meta Description
                    </label>
                    <textarea wire:model="meta_description" id="meta_description" placeholder="Enter Meta Description" rows="4"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300"></textarea>
                </div>
            </div>

            <!-- Update Button -->
            <div class="mt-5 flex justify-end space-x-3">
                <button type="reset"
                    class="rounded-md px-4 py-2.5 text-sm text-red-500 transition-colors duration-300 hover:bg-red-100">
                    Reset
                </button>
                <button wire:click='update' type="button"
                    class="flex w-full items-center justify-center rounded-md bg-blue-500 px-5 py-3 text-sm leading-5 text-white transition duration-300 ease-in-out hover:bg-blue-600 focus:outline-none sm:w-auto sm:px-4 sm:py-2">
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
