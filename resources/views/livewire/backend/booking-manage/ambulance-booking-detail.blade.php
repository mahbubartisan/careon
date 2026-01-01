<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Ambulance Booking Detail
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Ambulance Booking Detail</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

        <!-- LEFT CARD -->
        <div class="rounded-xl border border-gray-200 bg-white p-6">

            <h2 class="mb-6 text-xl font-semibold tracking-tight text-gray-900">
                Booking Summary
            </h2>

            <div class="space-y-4 text-sm">

                <div class="flex justify-between">
                    <span class="text-gray-500">Booking ID</span>
                    <span class="font-semibold text-gray-900">
                        #{{ $booking->booking_id }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Booking Type</span>
                    <span class="font-semibold text-gray-900">
                        {{ ucfirst($booking->booking_type) }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Ambulance Type</span>
                    <span class="font-semibold text-gray-900">
                        {{ $booking->ambulance_type }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Pickup Date & Time</span>
                    <span class="font-semibold text-gray-900">
                        {{ \Carbon\Carbon::parse($booking->pickup_datetime)->format("F j, Y • g:i A") }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Pickup Address</span>
                    <span class="max-w-xs text-right font-semibold text-gray-900">
                        {{ $booking->pickup_address }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Destination Address</span>
                    <span class="max-w-xs text-right font-semibold text-gray-900">
                        {{ $booking->destination_address }}
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Created By</span>
                    <span class="font-semibold text-gray-900">
                        {{ @$booking->user?->name ?? "N/A" }}
                    </span>
                </div>
            </div>
        </div>

        <!-- RIGHT CARD -->
        <div class="rounded-xl border border-gray-200 bg-white p-6">

            <h2 class="mb-6 text-xl font-semibold tracking-tight text-gray-900">
                Patient & Contact Details
            </h2>

            <div class="space-y-4 text-sm">

                <div class="flex justify-between">
                    <span class="text-gray-500">Patient Name</span>
                    <span class="font-semibold text-gray-900">
                        {{ $booking->patient_name }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Age</span>
                    <span class="font-semibold text-gray-900">
                        {{ $booking->patient_age }} years
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Gender</span>
                    <span class="font-semibold text-gray-900">
                        {{ ucfirst($booking->gender) }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Contact Person</span>
                    <span class="font-semibold text-gray-900">
                        {{ $booking->contact_person }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Phone</span>
                    <span class="font-semibold text-gray-900">
                        {{ $booking->phone }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Notes</span>
                    <span class="max-w-xs text-right font-semibold text-gray-900">
                        {{ $booking->notes ?? "N/A" }}
                    </span>
                </div>

            </div>
        </div>

    </div>

    <!-- BACK BUTTON -->
    <div class="mt-8">
        <a href="{{ route("ambulance.booking") }}"
            class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow-sm">

            <!-- SVG Icon -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-move-left-icon lucide-move-left">
                <path d="M6 8L2 12L6 16" />
                <path d="M2 12H22" />
            </svg>

            Back to List
        </a>
    </div>
</div>
