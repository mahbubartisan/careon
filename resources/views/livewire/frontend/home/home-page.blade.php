<div>
    @section("title", $settings->meta_title . " | CareOn - Professional Healthcare At Home | Bangladesh")
    @section("description", $settings->meta_description)

    @section("og_title", $settings->meta_title)
    @section("og_description", $settings->meta_description)
    @section("og_image", asset(@$settings->siteLogo?->path))

    <section>
        <!-- Hero Section -->
        @include("livewire.frontend.layouts.partials.hero-section")

        <!-- Info Row -->
        <section class="bg-[#FAFBFB] py-8">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-2 gap-6 md:grid-cols-4">
                    <!-- Item 1 -->
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-shield h-8 w-8 flex-shrink-0 text-[#00B686]">
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
                            class="h-8 w-8 flex-shrink-0 text-[#00B686]">
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
                            class="lucide lucide-star h-8 w-8 flex-shrink-0 text-[#00B686]">
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
                            class="lucide lucide-clock h-8 w-8 flex-shrink-0 text-[#00B686]">
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
        {{-- @include("livewire.frontend.layouts.partials.how-work-section") --}}

        <!-- Trusted Section -->
        {{-- @include("livewire.frontend.layouts.partials.review-section") --}}

        <!-- Call To Action Section -->
        @include("livewire.frontend.layouts.partials.call-to-action")
    </section>

    @push("title")
        CareOn - Professional Healthcare At Home | Bangladesh
    @endpush
</div>
