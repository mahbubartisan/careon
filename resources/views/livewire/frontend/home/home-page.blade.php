<div>
    <!-- Hero Section -->
    @include("livewire.frontend.layouts.partials.hero-section")

    <!-- Info Row -->
    <section class="bg-[#FAFBFB] py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Item 1 -->
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-shield w-8 h-8 text-[#00B686] flex-shrink-0">
                        <path
                            d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-900">
                        Certified Healthcare Professionals
                    </span>
                </div>

                <!-- Item 2 -->
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="w-8 h-8 text-[#00B686] flex-shrink-0">
                        <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                        <path d="m9 11 3 3L22 4"></path>
                    </svg>
                    <span class="text-sm font-medium text-gray-900">
                        Background Checked
                    </span>
                </div>

                <!-- Item 3 -->
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-star w-8 h-8 text-[#00B686] flex-shrink-0">
                        <path
                            d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-900">
                        Flexible Pricing
                    </span>
                </div>

                <!-- Item 4 -->
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-clock w-8 h-8 text-[#00B686] flex-shrink-0">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <span class="text-sm font-medium text-gray-900">
                        24/7 Availability
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Section -->
    @include("livewire.frontend.layouts.partials.service-section")

    <!-- How CareOn Work -->
    @include("livewire.frontend.layouts.partials.how-work-section")

    <!-- Trusted Section -->
    @include("livewire.frontend.layouts.partials.review-section")

    <!-- Call To Action Section -->
    @include("livewire.frontend.layouts.partials.call-to-action")

    <!-- Production Notice Modal -->
    <div x-data="{ showModal: true }" x-show="showModal" x-cloak
        class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-sm z-[999]">
        <div @click.away="showModal = false"
            class="bg-white rounded-2xl shadow-xl w-11/12 max-w-md p-6 text-center relative">
            <!-- Close Button -->
            <button @click="showModal = false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Modal Content -->
            <div class="space-y-4">
                <div class="mx-auto flex items-center justify-center w-16 h-16 rounded-full bg-[#00B686]/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#00B686]" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                    </svg>
                </div>

                <h2 class="text-xl font-semibold text-gray-800">
                    We’re Launching Soon | আমরা খুব শীঘ্রই লঞ্চ করছি
                </h2>
                <p class="text-gray-600 text-sm">
                    CareOn is currently under development. We will be in production very soon — stay tuned!
                    <br />
                    কেয়ারঅন বর্তমানে ডেভেলপমেন্টে রয়েছে। খুব শীঘ্রই প্রোডাকশনে আসছে — সাথেই থাকুন!
                </p>
                <p class="text-gray-600 text-sm">
                    You can book our services any time at 01319552222.
                    <br /> 
                    আপনি যে কোনো সময় আমাদের সেবা বুক করতে পারেন: ০১৩১৯৫৫২২২২।
                </p>

                <button @click="showModal = false"
                    class="mt-3 bg-[#00B686] hover:bg-[#00976F] text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                    Got it
                </button>
            </div>
        </div>
    </div>

    @push("title")
    CareOn - Professional Healthcare At Home | Bangladesh
    @endpush
</div>