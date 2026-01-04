<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-300">
            Diagnostic Booking Detail
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Diagnostic Booking Detail</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->

    <div class="mb-5 flex justify-end">
        <button type="button" wire:click="downloadInvoice"
            class="inline-flex items-center gap-2 rounded-xl bg-teal-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-teal-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v12m0 0l-4-4m4 4l4-4M4 20h16" />
            </svg>
            Download Invoice
        </button>
    </div>

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
                    <span class="text-gray-500">Diagnostic Center</span>
                    <span class="font-semibold text-gray-900">
                        {{ $booking->lab }}
                    </span>
                </div>

                {{-- <div class="flex justify-between items-start">
                    <span class="text-gray-500">Selected Tests</span>
                    <span class="max-w-xs text-right font-semibold text-gray-900">
                        @foreach ($booking->tests as $test)
                            • {{ $test }}<br>
                        @endforeach
                    </span>
                </div> --}}

                <div class="flex justify-between items-start">
                    <span class="text-gray-500">Selected Tests</span>
                
                    <ul class="max-w-xs list-disc pl-5 space-y-2 text-sm">
                        @foreach ($booking->tests as $name => $price)
                            <li>
                                <div class="flex justify-between gap-4">
                                    <span class="font-semibold text-gray-900">{{ $name }}</span>
                                    <span class="font-semibold text-teal-600">
                                        ৳ {{ number_format((float) $price) }}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="flex justify-between">
                    <span class="text-gray-500">Total Price</span>
                    <span class="font-semibold text-teal-600">
                        ৳ {{ number_format($booking->total_price) }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Created By</span>
                    <span class="font-semibold text-gray-900">
                        {{ @$booking->user?->name ?? "Guest User" }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Booking Date</span>
                    <span class="font-semibold text-gray-900">
                        {{ $booking->created_at->format("F j, Y • g:i A") }}
                    </span>
                </div>

            </div>
        </div>

        <!-- RIGHT CARD -->
        <div class="rounded-xl border border-gray-200 bg-white p-6">

            <h2 class="mb-6 text-xl font-semibold tracking-tight text-gray-900">
                Patient Details
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
                    <span class="text-gray-500">Phone</span>
                    <span class="font-semibold text-gray-900">
                        {{ $booking->phone }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Email</span>
                    <span class="font-semibold text-gray-900">
                        {{ $booking->email }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Address</span>
                    <span class="max-w-xs text-right font-semibold text-gray-900">
                        {{ $booking->address }}
                    </span>
                </div>

                @if ($booking->notes)
                    <div class="flex justify-between">
                        <span class="text-gray-500">Notes</span>
                        <span class="max-w-xs text-right font-semibold text-gray-900">
                            {{ $booking->notes }}
                        </span>
                    </div>
                @endif

            </div>
        </div>

    </div>


    <!-- BACK BUTTON -->
    <div class="mt-8">
        <a href="{{ route("diagnostic.booking") }}"
            class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow-sm">

            <!-- SVG Icon -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-move-left-icon lucide-move-left">
                <path d="M6 8L2 12L6 16" />
                <path d="M2 12H22" />
            </svg>

            Back to List
        </a>
    </div>
</div>
