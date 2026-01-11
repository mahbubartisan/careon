<div>
    <section class="mx-auto px-4 pb-16 pt-28">
        <!-- Back -->
        <a href="{{ route("frontend.service") }}"
            class="mb-8 flex items-center text-sm text-gray-600 hover:text-gray-900">
            <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Services
        </a>

        <div class="mx-auto max-w-7xl">

            <!-- Label: Service Type -->
            <span
                class="mb-3 inline-block rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                {{ @$service->type?->name }}
            </span>

            <!-- Title -->
            <h1 class="mb-2 text-3xl font-bold text-gray-900">
                {{ @$service->name }}
            </h1>

            <!-- Short Description -->
            <p class="max-w-7xl text-gray-600">
                {{ @$service->short_desc }}
            </p>
        </div>

        {{-- <div class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-0">

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm sm:p-8">

                <!-- Header -->
                <h2 class="mb-8 flex items-center gap-4 text-2xl font-semibold text-gray-900">
                    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-teal-500 text-white shadow">
                        🩺
                    </span>
                    Online Doctor Consultation
                </h2>

                <form wire:submit.prevent="book" class="space-y-8">

                    <!-- ================= Patient Information ================= -->
                    <div>
                        <h3 class="mb-4 text-lg font-medium text-gray-800">
                            Patient Information
                        </h3>

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <!-- Patient Name -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">
                                    Patient Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model="form.patient_name"
                                    class="@error("form.patient_name") border-red-400 @else border-gray-200 @enderror w-full rounded-xl border px-4 py-3 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100">

                                @error("form.patient_name")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Age -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">
                                    Age <span class="text-red-500">*</span>
                                </label>
                                <input type="number" wire:model="form.patient_age"
                                    class="@error("form.patient_age") border-red-400 @else border-gray-200 @enderror w-full rounded-xl border px-4 py-3 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100">

                                @error("form.patient_age")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Gender -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">
                                    Gender <span class="text-red-500">*</span>
                                </label>
                                <select wire:model="form.gender"
                                    class="w-full rounded-xl border bg-white px-4 py-3 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100">
                                    <option value="" hidden>-- Select --</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>

                                @error("form.gender")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">
                                    Phone Number <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" wire:model="form.phone" placeholder="+880 XXXXXXXX"
                                    class="@error("form.phone") border-red-400 @else border-gray-200 @enderror w-full rounded-xl border px-4 py-3 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100">

                                @error("form.phone")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">
                                    Email (Optional)
                                </label>
                                <input type="email" wire:model="form.email" placeholder="example@email.com"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100">

                                @error("form.email")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- ================= Consultation Details ================= -->
                    <div>
                        <h3 class="mb-4 text-lg font-medium text-gray-800">
                            Consultation Details
                        </h3>

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <!-- Doctor Type -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">
                                    Doctor Type <span class="text-red-500">*</span>
                                </label>
                                <select wire:model="form.doctor_type"
                                    class="w-full rounded-xl border bg-white px-4 py-3 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100">
                                    <option value="" hidden>-- Select Specialist --</option>
                                    <option>General Physician</option>
                                    <option>Cardiologist</option>
                                    <option>Dermatologist</option>
                                    <option>Pediatrician</option>
                                    <option>Gynecologist</option>
                                </select>

                                @error("form.doctor_type")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Appointment Date -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">
                                    Appointment Date <span class="text-red-500">*</span>
                                </label>
                                <input type="date" wire:model="form.appointment_date"
                                    class="@error("form.appointment_date") border-red-400 @else border-gray-200 @enderror w-full rounded-xl border px-4 py-3 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100">
                            </div>

                            <!-- Appointment Time -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">
                                    Time <span class="text-red-500">*</span>
                                </label>
                                <input type="time" wire:model="form.appointment_time"
                                    class="@error("form.appointment_time") border-red-400 @else border-gray-200 @enderror w-full rounded-xl border px-4 py-3 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100">
                            </div>

                        </div>
                    </div>

                    <!-- ================= Problem ================= -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Describe Your Problem <span class="text-red-500">*</span>
                        </label>
                        <textarea wire:model="form.problem" rows="4" placeholder="Briefly describe your symptoms..."
                            class="@error("form.problem") border-red-400 @else border-gray-200 @enderror w-full rounded-xl border px-4 py-3 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100"></textarea>

                        @error("form.problem")
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- ================= Submit ================= -->
                    <div class="flex justify-end pt-4">
                        <button type="submit"
                            class="rounded-xl bg-teal-500 px-8 py-3 text-sm font-medium text-white shadow transition hover:bg-teal-600 active:scale-95">
                            Book Consultation
                        </button>
                    </div>

                </form>
            </div>
        </div> --}}

        <div class="mx-auto max-w-5xl px-4 py-10">

            <div class="rounded-2xl border border-gray-200 bg-white p-6 sm:p-8">

                <!-- Header -->
                <h2 class="mb-8 flex items-center gap-3 text-2xl font-semibold text-gray-900">
                    <span class="flex h-12 w-12 items-center justify-center rounded-full bg-teal-500 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <title xmlns="">stethoscope-outline-rounded</title>
                            <path fill="currentColor"
                                d="M13.5 22q-2.7 0-4.6-1.9T7 15.5v-.575q-2.15-.35-3.575-2.013T2 9V4q0-.425.288-.712T3 3h2q0-.425.288-.712T6 2t.713.288T7 3v2q0 .425-.288.713T6 6t-.712-.288T5 5H4v4q0 1.65 1.175 2.825T8 13t2.825-1.175T12 9V5h-1q0 .425-.288.713T10 6t-.712-.288T9 5V3q0-.425.288-.712T10 2t.713.288T11 3h2q.425 0 .713.288T14 4v5q0 2.25-1.425 3.913T9 14.925v.575q0 1.875 1.313 3.188T13.5 20t3.188-1.312T18 15.5v-1.675q-.875-.325-1.437-1.088T16 11q0-1.25.875-2.125T19 8t2.125.875T22 11q0 .975-.562 1.738T20 13.825V15.5q0 2.7-1.9 4.6T13.5 22M19 12q.425 0 .713-.288T20 11t-.288-.712T19 10t-.712.288T18 11t.288.713T19 12m0-1" />
                        </svg>
                    </span>
                    Schedule a Online Doctor Consultation
                </h2>

                <form wire:submit.prevent="book" class="space-y-6">
                    <!-- Patient Type -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-900">
                            Booking For *
                        </label>

                        <div class="flex gap-6">
                            <label class="flex items-center gap-2 text-sm">
                                <input type="radio" wire:model.live="bookingFor" value="self"
                                    class="text-teal-500 focus:ring-teal-500">
                                Self
                            </label>

                            <label class="flex items-center gap-2 text-sm">
                                <input type="radio" wire:model.live="bookingFor" value="other"
                                    class="text-teal-500 focus:ring-teal-500">
                                Someone Else
                            </label>
                        </div>
                    </div>

                    <!-- Patient Info -->
                    <div class="space-y-6">
                        <h3 class="mb-4 text-lg font-medium text-gray-700">Patient Information</h3>

                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Patient Name *</label>
                                <input type="text" wire:model="form.patient_name"
                                    placeholder="Enter patient's full name"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                @error("form.patient_name")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Age *</label>
                                <input type="number" wire:model="form.patient_age" placeholder="Enter age (e.g. 32)"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                @error("form.patient_age")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Gender *</label>
                                <select wire:model="form.gender"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-[13px] text-sm focus:border-teal-500 focus:outline-none">
                                    <option value="" hidden>-- Select one --</option>
                                    @foreach (\App\Enums\Gender::values() as $gender)
                                        <option value="{{ $gender }}">{{ $gender }}</option>
                                    @endforeach
                                </select>
                                @error("form.gender")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Phone Number *
                                </label>
                                <input type="number" wire:model="form.phone" placeholder="+880 XXXXXXXX"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                @error("form.phone")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Email *
                                </label>
                                <input type="email" wire:model="form.email" placeholder="your@email.com"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                @error("form.email")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Consultation Details -->
                    <div>
                        <h3 class="mb-4 text-lg font-medium text-gray-700">Consultation Details</h3>

                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Doctor Type *
                                </label>
                                <select wire:model="form.doctor_type"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-[14px] text-sm focus:border-teal-500 focus:outline-none">
                                    <option value="" hidden>-- Select one --</option>
                                    @foreach (\App\Enums\DoctorType::values() as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                                @error("form.doctor_type")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Appointment Date *
                                </label>
                                <input type="date" wire:model="form.appointment_date"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                @error("form.appointment_date")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Appointment Time *
                                </label>
                                <input type="time" wire:model="form.appointment_time"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                @error("form.appointment_time")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Problem -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-900">
                            Your Problem *
                        </label>
                        <textarea wire:model="form.problem" rows="4" placeholder="Briefly describe your symptoms..."
                            class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none"></textarea>
                        @error("form.problem")
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end">
                        @auth
                            <button type="button" wire:click.prevent="book"
                                class="rounded-xl bg-teal-500 px-8 py-3 text-sm font-medium text-white transition hover:bg-teal-600">
                                Confirm Booking
                            </button>
                        @else
                            <button type="button" wire:click="redirectToLogin"
                                class="rounded-xl bg-teal-500 px-8 py-3 text-sm font-medium text-white transition hover:bg-teal-600">
                                Confirm Booking
                            </button>
                        @endauth
                    </div>

                </form>
            </div>
        </div>

    </section>

    @push("title")
        {{ @$service->name }}
    @endpush
</div>
