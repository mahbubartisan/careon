<!-- Footer -->
<footer class="bg-[#1D64B4] py-12 text-white">
    <div class="mx-auto grid grid-cols-1 gap-10 px-4 md:grid-cols-4">
        <!-- Brand -->
        <div>
            <div class="mb-3 flex items-center space-x-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#17C964] font-bold text-white">
                    C
                </div>
                <div>
                    <h2 class="text-lg font-semibold">CareOn</h2>
                    <p class="text-sm text-gray-300">Care, always on</p>
                </div>
            </div>
            <p class="mb-3 text-sm leading-relaxed text-gray-300">
                {{ $settings->meta_description }}
            </p>
            <p class="text-sm font-medium text-[#F9A826]">A Techutre brand</p>
        </div>

        <!-- Services -->
        <div>
            <h3 class="mb-3 text-base font-semibold">Services</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                @foreach ($services as $service)
                    <li>
                        <button wire:click="redirectToServiceForm('{{ $service->slug }}')"
                            class="text-left transition hover:text-white hover:underline">
                            {{ $service->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>


        <!-- Company -->
        <div>
            <h3 class="mb-3 text-base font-semibold">Company</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>
                    <a href="{{ route("frontend.about") }}"
                        class="text-left transition hover:text-white hover:underline">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="{{ route("frontend.contact-us") }}"
                        class="text-left transition hover:text-white hover:underline">
                        Contact
                    </a>
                </li>
                <li>Become a Provider</li>
            </ul>

            <h3 class="mb-3 mt-6 text-base font-semibold">Legal</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>Terms of Service</li>
                <li>Privacy Policy</li>
                <li>Refund Policy</li>
            </ul>
        </div>

        <!-- Contact -->
        <div>
            <h3 class="mb-3 text-base font-semibold">Get in Touch</h3>
            <ul class="space-y-4 text-sm text-gray-300">
                <li class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="mt-1 h-4 w-4 flex-shrink-0">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                    <div>
                        <p>{{ $settings->phone }}</p>
                        <p class="text-xs">24/7 Support</p>
                    </div>
                </li>
                <li class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="mt-1 h-4 w-4 flex-shrink-0">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                    <p>{{ $settings->email }}</p>
                </li>
                <li class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="mt-1 h-4 w-4 flex-shrink-0">
                        <path
                            d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                        </path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <p>{{ $settings->address }}</p>
                </li>
            </ul>
        </div>
    </div>

    <div class="mt-10 border-t border-white/20 pt-6 text-center text-sm text-gray-400">
        © 2025 <span class="font-normal">CareOn</span>. All rights reserved. A
        Techutre brand.
    </div>
</footer>
