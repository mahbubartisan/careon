<div>
    <div class="flex min-h-screen flex-col items-center justify-center px-4 pb-20 pt-28">
        <!-- Floating Header (Outside Top) -->
        <div class="z-10 -mb-6 flex flex-col items-center">
            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-teal-100 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-9 w-9 text-teal-500">
                    <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                    <path d="m9 11 3 3L22 4"></path>
                </svg>
            </div>
            <h1 class="my-5 text-3xl font-bold text-gray-900 lg:text-4xl">
                Booking Confirmed!
            </h1>
        </div>

        <!-- Main Booking Card -->
        <div class="relative z-0 mt-6 w-full max-w-2xl rounded-2xl border border-gray-200 p-6 md:p-8">
            <!-- Provider Call Notice -->
            <div class="mb-6 rounded-xl border border-orange-300 bg-orange-50 p-6 text-center">
                <h2 class="text-xl font-bold text-gray-900">
                    We Will Call You Soon
                </h2>
                <p class="mt-1 text-base text-gray-500">
                    Our team is currently assigning the best available nurse to your
                    case. You will receive a call within 15–30 minutes.
                </p>
            </div>

            <!-- Booking Details -->
            <div class="text-sm text-gray-900">
                <h3 class="mb-2 font-bold">Booking Details</h3>
                <div class="mb-6 rounded-xl border border-gray-200 p-6">
                    <div class="mb-2 flex justify-between">
                        <span class="text-gray-500">Service:</span>
                        <span class="font-medium">{{ $booking->service_name }}</span>
                    </div>
                    <div class="mb-2 flex justify-between">
                        <span class="text-gray-500">Booking ID:</span>
                        <span class="font-medium">#{{ $booking->booking_id }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">Status:</span>
                        <span
                            class="rounded-full border border-teal-200 bg-teal-100 px-3 py-1 text-xs font-medium text-teal-800">
                            Received
                        </span>
                        {{-- @if ($booking->status == 0)
                            <span
                                class="rounded-full border border-yellow-200 bg-yellow-100 px-3 py-1 text-xs font-medium text-yellow-700">
                                Pending
                            </span>
                        @endif --}}
                    </div>
                </div>

                <!-- What Happens Next -->
                <div class="mb-6 rounded-xl border border-gray-200 p-6">
                    <h4 class="mb-3 font-semibold text-gray-800">What Happens Next?</h4>
                    <ol class="list-inside list-decimal space-y-1 text-sm text-gray-600">
                        <li>
                            You will receive a confirmation call from our provider within
                            15–30 minutes
                        </li>
                        <li>
                            The assigned nurse will confirm the schedule and address details
                        </li>
                        <li>
                            You can track the nurse’s arrival in real-time on your booking
                            page
                        </li>
                        <li>Payment will be collected as per your selected method</li>
                        <li>After service completion, please rate your experience</li>
                    </ol>
                </div>

                <!-- Important Notes -->
                <div class="rounded-xl border border-green-100 bg-green-50 p-6">
                    <h4 class="mb-2 font-semibold text-gray-800">Important Notes:</h4>
                    <ul class="list-inside list-disc space-y-1 text-sm text-gray-600">
                        <li>Keep your phone accessible for the confirmation call</li>
                        <li>
                            Ensure the address and contact details provided are accurate
                        </li>
                        <li>Have necessary medical documents ready for the nurse</li>
                        <li>A safe and accessible workspace should be available</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Cards (Outside Form) -->
        <div class="mt-6 grid w-full max-w-2xl grid-cols-1 gap-4 lg:grid-cols-3">
            <!-- Call Support -->
            <div
                class="flex flex-col items-center rounded-2xl border border-gray-200 bg-gray-50/20 p-4 text-center transition duration-300 ease-in-out hover:cursor-pointer hover:bg-white hover:shadow-[0_0_25px_rgba(0,0,0,0.1)]">
                <div class="mb-2 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="mx-auto h-8 w-8 text-teal-500">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                </div>
                <p class="text-sm font-semibold text-gray-900">Call Support</p>
                <span class="text-xs text-gray-500">+8801319552222</span>
            </div>

            <!-- Need Support -->
            <a href="{{ route("frontend.contact-us") }}"
                class="flex flex-col items-center rounded-2xl border border-gray-200 bg-gray-50/20 p-4 text-center transition duration-300 ease-in-out hover:cursor-pointer hover:bg-white hover:shadow-[0_0_25px_rgba(0,0,0,0.1)]">
                <div class="mb-2 flex items-center justify-center">
                    <svg class="mx-auto h-8 w-8 text-teal-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 16v-4" />
                        <path d="M12 8h.01" />
                    </svg>
                </div>
                <p class="text-sm font-semibold text-gray-900">Need Support?</p>
                <span class="text-xs text-gray-500">Get instant help</span>
            </a>

            <!-- Back to Home -->
            <a href="{{ route("frontend.home-page") }}"
                class="flex flex-col items-center rounded-2xl border border-gray-200 bg-gray-50/20 p-4 text-center transition duration-300 ease-in-out hover:cursor-pointer hover:bg-white hover:shadow-[0_0_25px_rgba(0,0,0,0.1)]">
                <div class="mb-2 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="mx-auto h-8 w-8 text-teal-500">
                        <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path>
                        <path
                            d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                        </path>
                    </svg>
                </div>
                <p class="text-sm font-semibold text-gray-900">Back to Home</p>
                <span class="text-xs text-gray-500">Browse homepage</span>
            </a>
        </div>

        <div class="text-center">
            <a href="{{ route("frontend.service") }}"><button
                    class="mt-10 h-11 rounded-xl border border-gray-200 px-6 text-sm font-medium transition-colors hover:border-amber-500 hover:bg-amber-500 hover:text-gray-900">
                    Book Another Service
                </button></a>
        </div>
    </div>

    @push("title")
        Booking Confirmation
    @endpush -
</div>
