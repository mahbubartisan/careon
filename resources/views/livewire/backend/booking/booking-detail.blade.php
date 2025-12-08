<div>
    <div class="p-6">
        <h1 class="mb-6 text-2xl font-semibold">Booking Details</h1>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

            <!-- Left Card -->
            <div class="rounded-lg bg-white p-6 shadow">
                <h2 class="mb-4 text-lg font-semibold">Booking Summary</h2>

                <div class="space-y-2 text-sm">
                    <p><strong>Booking ID:</strong> #{{ $booking->booking_id }}</p>
                    <p><strong>Service:</strong> {{ $booking->service_name }}</p>
                    <p><strong>Package:</strong> {{ $booking->package_name }}</p>
                    <p><strong>Care Level:</strong> {{ $booking->care_level_name }} ({{ $booking->hours }} hrs)</p>
                    <p><strong>Location Group:</strong> {{ $booking->location_group }}</p>
                    <p><strong>Location:</strong> {{ $booking->location_name }}</p>

                    <p><strong>Date & Time:</strong> {{ $booking->date }} {{ $booking->time }}</p>

                    <p><strong>Care Price:</strong> ৳{{ number_format($booking->price) }}</p>
                    <p><strong>Location Fee:</strong> ৳{{ number_format($booking->location_price) }}</p>

                    <p class="text-lg font-bold text-green-600">
                        Total: ৳{{ number_format($booking->total_price) }}
                    </p>
                </div>
            </div>

            <!-- Right Card -->
            <div class="rounded-lg bg-white p-6 shadow">
                <h2 class="mb-4 text-lg font-semibold">Patient Details</h2>

                @if ($booking->patient)
                    <div class="space-y-2 text-sm">
                        <p><strong>Patient Name:</strong> {{ $booking->patient->name }}</p>
                        <p><strong>Gender:</strong> {{ $booking->patient->gender }}</p>
                        <p><strong>Height:</strong> {{ $booking->patient->height }}</p>
                        <p><strong>Weight:</strong> {{ $booking->patient->weight }}</p>
                        <p><strong>Patient Contact:</strong> {{ $booking->patient->patient_contact }}</p>
                        <p><strong>Emergency Contact:</strong> {{ $booking->patient->emergency_contact }}</p>
                        <p><strong>Patient Address:</strong> {{ $booking->patient->address }}</p>
                        <p><strong>Patient Type:</strong> {{ $booking->patient->patient_type }}</p>
                        <p><strong>Country:</strong> {{ $booking->patient->country ?: "N/A" }}</p>
                    </div>
                @else
                    <p class="text-gray-500">No patient details recorded.</p>
                @endif
            </div>

        </div>

        <div class="mt-6">
            <a href="{{ route("booking") }}" class="rounded bg-gray-700 px-4 py-2 text-white">
                Back to List
            </a>
        </div>
    </div>
</div>
