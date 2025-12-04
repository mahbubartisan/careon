<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Contact Detail
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Contact Detail</li>
            </ol>
        </nav>
    </div>
    <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
        <h2 class="text-[15px] text-gray-900 dark:text-gray-300 font-medium mb-4">Contact Information</h2>
        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- First Name -->
                <div>
                    <label for="first_name" class="block text-sm text-gray-700 dark:text-gray-400">
                        First Name
                    </label>
                    <input type="text" wire:model="form.first_name" id="first_name" disabled
                        class="w-full mt-2 px-4 py-3 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>

                <!-- Last Name -->
                <div>
                    <label for="last_name" class="block text-sm text-gray-700 dark:text-gray-400">
                        Last Name
                    </label>
                    <input type="text" wire:model="form.last_name" id="last_name" disabled
                        class="w-full mt-2 px-4 py-3 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm text-gray-700 dark:text-gray-400">
                        Email
                    </label>
                    <input type="text" wire:model="form.email" id="email" disabled
                        class="w-full mt-2 px-4 py-3 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone" class="block text-sm text-gray-700 dark:text-gray-400">
                        Phone Number
                    </label>
                    <input type="text" wire:model="form.phone" id="phone" disabled
                        class="w-full mt-2 px-4 py-3 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>
            </div>
            <!-- Subject -->
            <div>
                <label for="subject" class="block text-sm text-gray-700 dark:text-gray-400">
                    Subject
                </label>
                <input type="text" wire:model="form.subject" id="subject" disabled
                    class="w-full mt-2 px-4 py-3 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
            </div>
            <!-- Message -->
            <div>
                <label for="message" class="block text-sm text-gray-700 dark:text-gray-400">
                    Message
                </label>
                <textarea wire:model="form.message" id="message" rows="4"
                    class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out"></textarea>
            </div>
        </div>
    </div>
</div>
