<div>
    {{-- <div class="p-6 lg:p-10 min-h-screen">

        <!-- PAGE TITLE -->
        <h1 class="mb-10 text-3xl font-bold text-gray-900 flex items-center gap-3">
            Booking Details
        </h1>
    
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
    
            <!-- LEFT CARD -->
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition">
    
                <h2 class="text-xl font-semibold text-gray-900 mb-6">
                    Booking Summary
                </h2>
    
                <div class="space-y-4 text-sm">
    
                    <!-- Row -->
                    <div class="flex justify-between">
                        <span class="text-gray-500">Booking ID</span>
                        <span class="font-semibold text-gray-900">#{{ $booking->booking_id }}</span>
                    </div>
    
                    <!-- Row -->
                    <div class="flex justify-between">
                        <span class="text-gray-500">Service</span>
                        <span class="font-semibold text-gray-900">{{ $booking->service_name }}</span>
                    </div>
    
                    <!-- Row -->
                    <div class="flex justify-between">
                        <span class="text-gray-500">Package</span>
                        <span class="font-semibold text-gray-900">{{ $booking->package_name }}</span>
                    </div>
    
                    <!-- Row -->
                    <div class="flex justify-between">
                        <span class="text-gray-500">Care Level</span>
                        <span class="font-semibold text-gray-900">
                            {{ $booking->care_level_name }} ({{ $booking->hours }} hrs)
                        </span>
                    </div>
    
                    <!-- Row -->
                    <div class="flex justify-between">
                        <span class="text-gray-500">Location Group</span>
                        <span class="font-semibold text-gray-900">{{ $booking->location_group }}</span>
                    </div>
    
                    <!-- Row -->
                    <div class="flex justify-between">
                        <span class="text-gray-500">Location</span>
                        <span class="font-semibold text-gray-900">{{ $booking->location_name }}</span>
                    </div>
    
                    <!-- Row -->
                    <div class="flex justify-between">
                        <span class="text-gray-500">Date & Time</span>
                        <span class="font-semibold text-gray-900">
                            {{ \Carbon\Carbon::parse($booking->date)->format("F j, Y") }} •
                            {{ \Carbon\Carbon::parse($booking->time)->format("g:i A") }}
                        </span>
                    </div>
    
                    <!-- PRICE SECTION -->
                    <div class="pt-5 border-t space-y-3">
    
                        <div class="flex justify-between">
                            <span class="text-gray-500">Care Price</span>
                            <span class="font-semibold text-gray-900">
                                ৳{{ number_format($booking->price) }}
                            </span>
                        </div>
    
                        <div class="flex justify-between">
                            <span class="text-gray-500">Location Fee</span>
                            <span class="font-semibold text-gray-900">
                                ৳{{ number_format($booking->location_price) }}
                            </span>
                        </div>
    
                        <div class="flex justify-between text-lg font-bold text-green-600 pt-3">
                            <span class="text-gray-900">Total</span>
                            <span>৳{{ number_format($booking->total_price) }}</span>
                        </div>
    
                    </div>
                </div>
    
            </div>
    
            <!-- RIGHT CARD -->
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition">
    
                <h2 class="text-xl font-semibold text-gray-900 mb-6">
                    Patient Details
                </h2>
    
                @if ($booking->patient)
                    <div class="space-y-4 text-sm">
    
                        <div class="flex justify-between">
                            <span class="text-gray-500">Patient Name</span>
                            <span class="font-semibold text-gray-900">{{ $booking->patient->name }}</span>
                        </div>
    
                        <div class="flex justify-between">
                            <span class="text-gray-500">Gender</span>
                            <span class="font-semibold text-gray-900">{{ $booking->patient->gender }}</span>
                        </div>
    
                        <div class="flex justify-between">
                            <span class="text-gray-500">Height</span>
                            <span class="font-semibold text-gray-900">{{ $booking->patient->height }}</span>
                        </div>
    
                        <div class="flex justify-between">
                            <span class="text-gray-500">Weight</span>
                            <span class="font-semibold text-gray-900">{{ $booking->patient->weight }}</span>
                        </div>
    
                        <div class="flex justify-between">
                            <span class="text-gray-500">Contact</span>
                            <span class="font-semibold text-gray-900">{{ $booking->patient->patient_contact }}</span>
                        </div>
    
                        <div class="flex justify-between">
                            <span class="text-gray-500">Emergency Contact</span>
                            <span class="font-semibold text-gray-900">{{ $booking->patient->emergency_contact }}</span>
                        </div>
    
                        <div class="flex justify-between">
                            <span class="text-gray-500">Address</span>
                            <span class="font-semibold text-gray-900">{{ $booking->patient->address }}</span>
                        </div>
    
                        <div class="flex justify-between">
                            <span class="text-gray-500">Patient Type</span>
                            <span class="font-semibold text-gray-900">{{ $booking->patient->patient_type }}</span>
                        </div>
    
                        <div class="flex justify-between">
                            <span class="text-gray-500">Country</span>
                            <span class="font-semibold text-gray-900">{{ $booking->patient->country ?: 'N/A' }}</span>
                        </div>
    
                    </div>
                @else
                    <p class="text-gray-500">No patient details recorded.</p>
                @endif
    
            </div>
    
        </div>
    
        <!-- BACK BUTTON -->
        <div class="mt-10">
            <a href="{{ route('booking') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-gray-900 px-6 py-3 text-white font-semibold shadow-sm hover:bg-black transition">
                Back to List
            </a>
        </div>
    
    </div> --}}


    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Booking Detail
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Bookings</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

        <!-- LEFT CARD -->
        <div class="rounded-2xl border border-gray-200 bg-white p-6">

            <h2 class="mb-6 text-xl font-semibold tracking-tight text-gray-900">
                Booking Summary
            </h2>

            <div class="space-y-4 text-sm">

                <!-- Row -->
                <div class="flex justify-between">
                    <span class="text-gray-500">Booking ID</span>
                    <span class="font-semibold text-gray-900">#{{ $booking->booking_id }}</span>
                </div>

                <!-- Row -->
                <div class="flex justify-between">
                    <span class="text-gray-500">Service</span>
                    <span class="font-semibold text-gray-900">{{ $booking->service_name }}</span>
                </div>

                <!-- Row -->
                <div class="flex justify-between">
                    <span class="text-gray-500">Package</span>
                    <span class="font-semibold text-gray-900">{{ $booking->package_name }}</span>
                </div>

                <!-- Row -->
                <div class="flex justify-between">
                    <span class="text-gray-500">Care Level</span>
                    <span class="font-semibold text-gray-900">
                        {{ $booking->care_level_name }} ({{ $booking->hours }} hrs)
                    </span>
                </div>

                <!-- Row -->
                <div class="flex justify-between">
                    <span class="text-gray-500">Location Group</span>
                    <span class="font-semibold text-gray-900">{{ $booking->location_group }}</span>
                </div>

                <!-- Row -->
                <div class="flex justify-between">
                    <span class="text-gray-500">Location</span>
                    <span class="font-semibold text-gray-900">{{ $booking->location_name }}</span>
                </div>

                <!-- Row -->
                <div class="flex justify-between">
                    <span class="text-gray-500">Date & Time</span>
                    <span class="font-semibold text-gray-900">
                        {{ \Carbon\Carbon::parse($booking->date)->format("F j, Y") }} •
                        {{ \Carbon\Carbon::parse($booking->time)->format("g:i A") }}
                    </span>
                </div>

                <!-- PRICE SECTION -->
                <div class="space-y-3 border-t pt-5">

                    <div class="flex justify-between">
                        <span class="text-gray-500">Care Price</span>
                        <span class="font-semibold text-gray-900">
                            ৳{{ number_format($booking->price) }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Location Fee</span>
                        <span class="font-semibold text-gray-900">
                            ৳{{ number_format($booking->location_price) }}
                        </span>
                    </div>

                    <div class="flex justify-between pt-3 text-lg font-bold text-green-600">
                        <span class="text-gray-900">Total</span>
                        <span>৳{{ number_format($booking->total_price) }}</span>
                    </div>

                </div>
            </div>

        </div>

        <!-- RIGHT CARD -->
        <div class="rounded-2xl border border-gray-200 bg-white p-6">

            <h2 class="mb-6 text-xl font-semibold tracking-tight text-gray-900">
                Patient Details
            </h2>

            @if ($booking->patient)
                <div class="space-y-4 text-sm">

                    <div class="flex justify-between">
                        <span class="text-gray-500">Patient Name</span>
                        <span class="font-semibold text-gray-900">{{ optional($booking->patient)->name }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Gender</span>
                        <span class="font-semibold text-gray-900">{{ ucfirst(optional($booking->patient)->gender) }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Height</span>
                        <span class="font-semibold text-gray-900">{{ optional($booking->patient)->height }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Weight</span>
                        <span class="font-semibold text-gray-900">{{ optional($booking->patient)->weight }}kg</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Patient Contact</span>
                        <span class="font-semibold text-gray-900">{{ optional($booking->patient)->patient_contact }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Emergency Contact</span>
                        <span class="font-semibold text-gray-900">{{ optional($booking->patient)->emergency_contact }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Patient Address</span>
                        <span class="font-semibold text-gray-900">{{ optional($booking->patient)->address }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Patient Type</span>
                        <span class="font-semibold text-gray-900">{{ optional($booking->patient)->patient_type }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Country</span>
                        <span class="font-semibold text-gray-900">{{ optional($booking->patient)->country ?: "N/A" }}</span>
                    </div>

                </div>
            @else
                <p class="text-gray-500">No patient details recorded.</p>
            @endif

        </div>

    </div>

    <!-- BACK BUTTON -->
    <div class="mt-10">
        <a href="{{ route("booking") }}"
            class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-6 py-3 font-semibold text-white shadow-sm">
            Back to List
        </a>
    </div>

</div>
