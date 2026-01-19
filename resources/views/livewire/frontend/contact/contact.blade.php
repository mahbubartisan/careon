<div>
    <!-- Contact Form -->
    <div class="mx-auto max-w-6xl px-4 py-24" x-data="{ tab: @entangle("activeTab").live }">
        <!-- Header -->
        <div class="mb-10 text-center">
            <button class="mb-3 cursor-text rounded-full bg-[#00B686] px-3 py-1 text-xs font-bold text-white">
                যোগাযোগ করুন | Get in Touch
            </button>
            <h1 class="mb-4 text-4xl font-bold lg:text-5xl">
                আমরা আপনার সেবায় নিয়োজিত
            </h1>
            <p class="text-lg text-gray-500">
                We're here to help. Reach out for support, feedback, or custom service
                requests.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Left Contact Info -->
            <div class="space-y-4">
                <!-- Phone -->
                <div class="flex items-start gap-3 rounded-xl border bg-white p-6">
                    <div class="rounded-full bg-[#00B686]/10 p-3 text-[#00B686]">
                        <!-- Phone SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 font-semibold">Phone | ফোন</h3>
                        <p class="text-sm text-gray-500">
                            {{ $settings->phone }}<br /><span class="text-xs">24/7 Support Available</span>
                        </p>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="flex items-start gap-3 rounded-xl border bg-white p-6">
                    <div class="rounded-full bg-[#00B686]/10 p-3 text-[#00B686]">
                        <!-- WhatsApp SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                            <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 font-semibold">WhatsApp | হোয়াটসঅ্যাপ</h3>
                        <p class="text-sm text-gray-500">
                            {{ $settings->whatsapp }}<br /><span class="text-xs">Quick responses</span>
                        </p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-start gap-3 rounded-xl border bg-white p-6">
                    <div class="rounded-full bg-[#00B686]/10 p-3 text-[#00B686]">
                        <!-- Email SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 font-semibold">Email | ইমেইল</h3>
                        <p class="text-sm text-gray-500">
                            {{ $settings->email }}<br /><span class="text-xs">Response within 24 hours</span>
                        </p>
                    </div>
                </div>

                <!-- Office -->
                <div class="flex items-start gap-3 rounded-xl border bg-white p-6">
                    <div class="rounded-full bg-[#00B686]/10 p-3 text-[#00B686]">
                        <!-- Office SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                            <path
                                d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                            </path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 font-semibold">Office Address | অফিস ঠিকানা</h3>
                        <p class="text-sm text-gray-500">
                            {{ $settings->address }}
                        </p>
                    </div>
                </div>

                <!-- Hours -->
                <div class="flex items-start gap-3 rounded-xl border bg-white p-6">
                    <div class="rounded-full bg-[#00B686]/10 p-3 text-[#00B686]">
                        <!-- Clock SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div>
                        <h3 class="mb-2 font-semibold">Service Hours | সেবা সময়</h3>
                        <p class="text-sm text-gray-500">
                            24/7 for emergencies<br /><span class="text-xs">{{ $settings->office_hours }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Contact Tabs + Forms -->
            <div class="rounded-xl border bg-white p-6 lg:col-span-2">
                <h3 class="mb-4 text-lg font-semibold">
                    আপনার প্রয়োজন | What can we help you with?
                </h3>

                <!-- Tabs -->
                <div class="mb-6 grid grid-cols-1 gap-3 text-sm font-medium lg:grid-cols-2">
                    <button @click="tab = 'general'"
                        :class="tab === 'general'
                            ?
                            'bg-[#00B686] text-white' :
                            'border text-gray-900 hover:bg-amber-500'"
                        class="w-full rounded-xl py-2.5 transition duration-300 ease-in-out">
                        General Inquiry
                    </button>

                    <button @click="tab = 'feedback'"
                        :class="tab === 'feedback'
                            ?
                            'bg-[#00B686] text-white' :
                            'border text-gray-900 hover:bg-amber-500'"
                        class="w-full rounded-xl py-2.5 transition duration-300 ease-in-out">
                        Feedback
                    </button>

                    <!-- <button
                        @click="tab = 'custom'"
                        :class="tab === 'custom'
                            ?
                            'bg-[#00B686] text-white' :
                            'border text-gray-900 hover:bg-amber-500'"
                        class="w-full rounded-xl py-2.5 transition duration-300 ease-in-out">
                        Custom Service
                    </button> -->
                </div>

                <!-- General Inquiry Form -->
                <form x-show="tab === 'general'" wire:key="general-form" y-transition class="space-y-4">
                    <div class="grid gap-4 lg:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-medium">পূর্ণ নাম | Full Name *</label>
                            <input type="text" wire:model="generalForm.name"
                                class="@error("generalForm.name") border-red-500 @enderror w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                                placeholder="Your name" />
                            @error("generalForm.name")
                                <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium">ফোন নম্বর | Phone Number
                                *</label>
                            <input type="number" wire:model="generalForm.phone"
                                class="@error("generalForm.phone") border-red-500 @enderror w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                                placeholder="+880 1XXX-XXXXXX" />
                            @error("generalForm.phone")
                                <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium">ইমেইল | Email Address *</label>
                        <input type="email" wire:model="generalForm.email"
                            class="@error("generalForm.email") border-red-500 @enderror w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                            placeholder="your@email.com" />
                        @error("generalForm.email")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium">বিষয় | Subject *</label>
                        <input type="text" wire:model="generalForm.subject"
                            class="@error("generalForm.subject") border-red-500 @enderror w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                            placeholder="What's this about?" />
                        @error("generalForm.subject")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium">বার্তা | Message *</label>
                        <textarea wire:model="generalForm.message"
                            class="@error("generalForm.message") border-red-500 @enderror w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                            rows="6" placeholder="Tell us how we can help you... | আমা কীভাবে আপাকে সাহায্য করতে পারি..."></textarea>
                        @error("generalForm.message")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-xs text-gray-500">
                        * Required fields | * প্রয়োজনীয় তথ্য
                    </div>
                    <button type="button" wire:click="submitGeneralInquiry"
                        class="w-full rounded-lg bg-[#00B686] py-3 text-sm font-medium text-white hover:bg-[#00976F]">
                        Send Message | বার্তা পাঠান
                    </button>
                </form>

                <!-- Feedback Form -->
                <form x-show="tab === 'feedback'" wire:key="feedback-form" y-transition class="space-y-4">
                    <div class="grid gap-4 lg:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-medium">পূর্ণ নাম | Full Name *</label>
                            <input type="text" wire:model="feedbackForm.name"
                                class="@error("feedbackForm.name") border-red-500 @enderror w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                                placeholder="Your name" />
                            @error("feedbackForm.name")
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium">
                                ফোন নম্বর | Phone Number *
                            </label>
                            <input type="number" wire:model="feedbackForm.phone"
                                class="@error("feedbackForm.phone") border-red-500 @enderror w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                                placeholder="+880 1XXX-XXXXXX" />
                            @error("feedbackForm.phone")
                                <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium">ইমেইল | Email Address *</label>
                        <input type="email" wire:model="feedbackForm.email"
                            class="@error("feedbackForm.email") border-red-500 @enderror w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                            placeholder="your@email.com" />
                        @error("feedbackForm.email")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium">Which service did you use?</label>
                        <select wire:model="feedbackForm.service"
                            class="@error("feedbackForm.service") border-red-500 @enderror w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none">
                            <option value="" hidden>-- Select one --</option>
                            @foreach ($services as $service)
                                <option>{{ $service->name }}</option>
                            @endforeach
                        </select>
                        @error("feedbackForm.service")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium">রেটিং | Rating *</label>
                        <select wire:model="feedbackForm.rating"
                            class="@error("feedbackForm.rating") border-red-500 @enderror w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none">
                            <option value="" hidden>
                                How satisfied were you?
                            </option>
                            <option>⭐⭐⭐⭐⭐ Excellent</option>
                            <option>⭐⭐⭐⭐ Good</option>
                            <option>⭐⭐ Average</option>
                            <option>⭐⭐ Poor</option>
                            <option>⭐ Very Poor</option>
                        </select>
                        @error("feedbackForm.rating")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium">বিষয় | Subject *</label>
                        <input type="text" wire:model="feedbackForm.subject"
                            class="@error("feedbackForm.subject") border-red-500 @enderror w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                            placeholder="Brief summary of your feedback" />
                        @error("feedbackForm.subject")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium">বার্তা | Message *</label>
                        <textarea wire:model="feedbackForm.message"
                            class="@error("feedbackForm.message") border-red-500 @enderror w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                            rows="6" placeholder="Share your experience with us... | আপনার অভি্ঞতা শেয়ার করুন..."></textarea>
                        @error("feedbackForm.message")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-xs text-gray-500">
                        * Required fields | * প্রয়োজনীয় তথ্য
                    </div>
                    <button type="button" wire:click="submitFeedback"
                        class="w-full rounded-lg bg-[#00B686] py-3 text-sm font-medium text-white hover:bg-[#00976F]">
                        Submit Feedback | মতামত পাঠান
                    </button>
                </form>

                <!-- Custom Service Form -->
                <!-- <form x-show="tab === 'custom'" y-transition class="space-y-4">
                    <div class="grid gap-4 lg:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-medium leading-none">নাম | Full Name *</label>
                            <input
                                type="text"
                                class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                                placeholder="Your name" />
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium leading-none">ফোন | Phone Number *</label>
                            <input
                                type="text"
                                class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                                placeholder="+880 1XXX-XXXXXX" />
                        </div>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium leading-none">ইমেইল | Email Address *</label>
                        <input
                            type="email"
                            class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                            placeholder="your@email.com" />
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium leading-none">Custom Service Details | বিশেষ সেবার বিবরণ</label>
                        <input
                            type="text"
                            class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                            placeholder="What specific service do you need?" />
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium leading-none">Location | স্থান</label>
                        <input
                            type="text"
                            class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                            placeholder="Where do you need the service?" />
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium">Expected Duration | প্রত্যাশিত সময়কা</label>
                        <select
                            class="w-full rounded-md border p-2 text-sm focus:outline-green-500">
                            <option value="" selected disabled hidden>
                                How long do you need the service?
                            </option>
                            <option value="once">One-time service</option>
                            <option value="once">One-time service</option>
                            <option value="daily">Daily (ongoing)</option>
                            <option value="weekly">Weekly basis</option>
                            <option value="monthly">Monthly basis</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium leading-none">িষয় | Subject *</label>
                        <input
                            type="text"
                            class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none"
                            placeholder="Customer service request" />
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium leading-none">বার্তা | Message *</label>
                        <textarea class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none" rows="6"
                            placeholder="Describe your custom service requirements in detail..."></textarea>
                    </div>
                    <div class="text-xs text-gray-500">
                        * Required fields | * প্রয়োজনীয় তথ্য
                    </div>
                    <button
                        type="submit"
                        class="w-full rounded-lg bg-[#00B686] py-3 text-sm font-medium text-white hover:bg-[#00976F]">
                        Request Custom Service | বিশেষ সেবার অনুরোধ করুন
                    </button>
                </form> -->
                <div class="mt-6 p-4">
                    <p class="text-sm text-gray-500">
                        <strong>Note:</strong> For urgent medical assistance, please call
                        our 24/7 helpline. For general inquiries, we typically respond
                        within 24 hours.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    @if ($showModal)
        @include("livewire.frontend.contact.fragments.success-modal")
    @endif

    @push("title")
        CareOn - Contact Us
    @endpush
</div>
