@php
    $settings = App\Models\Settings::first();
@endphp

<!-- Footer -->
<footer class="bg-[#1D64B4] text-white py-12">
    <div class="mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-10">
        <!-- Brand -->
        <div>
            <div class="flex items-center space-x-3 mb-3">
                <div class="w-10 h-10 rounded-full bg-[#17C964] flex items-center justify-center text-white font-bold">
                    C
                </div>
                <div>
                    <h2 class="text-lg font-semibold">CareOn</h2>
                    <p class="text-sm text-gray-300">Care, always on</p>
                </div>
            </div>
            <p class="text-sm text-gray-300 leading-relaxed mb-3">
                Professional healthcare services at your doorstep. Verified,
                trusted, and always available.
            </p>
            <p class="text-sm text-[#F9A826] font-medium">A Techutre brand</p>
        </div>

        <!-- Services -->
        <div>
            <h3 class="text-base font-semibold mb-3">Services</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>Nursing Care</li>
                <li>Doctor-on-Call</li>
                <li>Physiotherapy</li>
                <li>Nanny & Baby Care</li>
                <li>Elderly Care</li>
                <li>Patient Attendant</li>
                <li>Sample Collection</li>
            </ul>
        </div>

        <!-- Company -->
        <div>
            <h3 class="text-base font-semibold mb-3">Company</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>About Us</li>
                <li>How It Works</li>
                <li>Contact</li>
                <li>Become a Provider</li>
            </ul>

            <h3 class="text-base font-semibold mt-6 mb-3">Legal</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>Terms of Service</li>
                <li>Privacy Policy</li>
                <li>Refund Policy</li>
            </ul>
        </div>

        <!-- Contact -->
        <div>
            <h3 class="text-base font-semibold mb-3">Get in Touch</h3>
            <ul class="space-y-4 text-sm text-gray-300">
                <li class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-4 h-4 mt-1 flex-shrink-0">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                    <div>
                        <p>+880 131 955 2222</p>
                        <p class="text-xs">24/7 Support</p>
                    </div>
                </li>
                <li class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-4 h-4 mt-1 flex-shrink-0">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                    <p>info@careon.me</p>
                </li>
                <li class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-4 h-4 mt-1 flex-shrink-0">
                        <path
                            d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                        </path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <p>House 06, Road 02, Block L, Banani, Dhaka 1213, Bangladesh</p>
                </li>
            </ul>
        </div>
    </div>

    <div class="mt-10 border-t border-white/20 pt-6 text-center text-sm text-gray-400">
        © 2025 <span class="font-normal">CareOn</span>. All rights reserved. A
        Techutre brand.
    </div>
</footer>
