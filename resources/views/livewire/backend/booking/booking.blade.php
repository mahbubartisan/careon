<div>
    <div class="p-6">
        <h1 class="mb-6 text-2xl font-semibold">Bookings</h1>

        <div class="overflow-hidden rounded-lg bg-white shadow">
            <table class="min-w-full">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-3 text-sm font-semibold">Booking ID</th>
                        <th class="p-3 text-sm font-semibold">Service</th>
                        <th class="p-3 text-sm font-semibold">Package</th>
                        <th class="p-3 text-sm font-semibold">Patient</th>
                        <th class="p-3 text-sm font-semibold">Date</th>
                        <th class="p-3 text-sm font-semibold">Total</th>
                        <th class="p-3 text-right text-sm font-semibold">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($bookings as $booking)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">#{{ $booking->booking_id }}</td>
                            <td class="p-3">{{ $booking->service_name }}</td>
                            <td class="p-3">{{ $booking->package_name }}</td>
                            <td class="p-3">{{ optional($booking->patient)->name ?? "N/A" }}</td>
                            <td class="p-3">{{ $booking->date }} {{ $booking->time }}</td>
                            <td class="p-3 font-semibold text-green-600">৳{{ number_format($booking->total_price) }}
                            </td>

                            <td class="p-3 text-right">
                                <a href="{{ route("booking.detail", $booking->id) }}"
                                    class="rounded bg-blue-600 px-3 py-1 text-sm text-white">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-6 text-center text-red-500">
                                No bookings found...
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="p-4">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</div>
