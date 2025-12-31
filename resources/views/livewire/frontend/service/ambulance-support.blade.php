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

        <div class="mx-auto max-w-4xl py-8">
            <div class="rounded-xl border p-6">
                <h2 class="mb-6 flex items-center gap-3 text-2xl font-semibold text-gray-900">
                    <!-- Icon Circle -->
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-500">
                        <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M10 10H6" />
                            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2" />
                            <path
                                d="M19 18h2a1 1 0 0 0 1-1v-3.28a1 1 0 0 0-.684-.948l-1.923-.641a1 1 0 0 1-.578-.502l-1.539-3.076A1 1 0 0 0 16.382 8H14" />
                            <path d="M8 8v4" />
                            <path d="M9 18h6" />
                            <circle cx="17" cy="18" r="2" />
                            <circle cx="7" cy="18" r="2" />
                        </svg>
                    </span>

                    Hire an Ambulance
                </h2>

                <form class="space-y-6">

                    <!-- Patient Information -->
                    <div>
                        <h3 class="mb-4 text-lg font-medium text-gray-700">Patient Information</h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Patient Name *</label>
                                <input type="text" wire:model="form.patient_name" placeholder="Enter patient name"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                @error("form.patient_name")
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Patient Age *</label>
                                <input type="number" wire:model="form.patient_age" placeholder="Enter age (e.g. 32)"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                @error("form.patient_age")
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Gender *</label>
                                <select wire:model="form.gender"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                    <option value="" hidden>-- Select one --</option>
                                    @foreach (\App\Enums\Gender::values() as $gender)
                                        <option value="{{ $gender }}">{{ $gender }}</option>
                                    @endforeach
                                </select>
                                @error("form.gender")
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Email Address
                                </label>
                                <input type="email" wire:model="form.email" placeholder="Email Address"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                @error("form.email")
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div>
                        <h3 class="mb-4 text-lg font-medium text-gray-700">Contact Details</h3>

                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Contact Person *</label>
                                <input type="text" wire:model="form.contact_person" placeholder="Full name"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                @error("form.contact_person")
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Phone Number *</label>
                                <input type="number" wire:model="form.phone" placeholder="+880 XXXXXXXX"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                @error("form.phone")
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Location Details -->
                    <div>
                        <h3 class="mb-4 text-lg font-medium text-gray-700">Pickup & Destination</h3>

                        <div class="space-y-4">
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Pickup Address *</label>
                                <textarea wire:model="form.pickup_address" rows="2" placeholder="Pickup location"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none"></textarea>
                                @error("form.pickup_address")
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Destination Address *
                                </label>
                                <textarea wire:model="form.destination_address" rows="2" placeholder="Hospital or destination"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none"></textarea>
                                @error("form.destination_address")
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Ambulance Details -->
                    <div>
                        <h3 class="mb-4 text-lg font-medium text-gray-700">Ambulance Details</h3>

                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Ambulance Type *</label>
                                <select wire:model="form.ambulance_type"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                    <option value="" hidden>-- Select one --</option>
                                    <option>ICU</option>
                                    <option>NICU</option>
                                    <option>AC</option>
                                    <option>Air</option>
                                    <option>Freezer</option>
                                    <option>None-AC</option>
                                </select>
                                @error("form.ambulance_type")
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Booking Type *</label>
                                <select wire:model="form.booking_type"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                    <option value="" hidden>-- Select one --</option>
                                    <option>Emergency</option>
                                    <option>Scheduled</option>
                                </select>
                                @error("form.booking_type")
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">Pickup Date & Time *</label>
                                <input type="datetime-local" wire:model="form.pickup_datetime"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                @error("form.pickup_datetime")
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Additional Notes -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-900">
                            Additional Notes <span class="text-xs">(if any)</span>
                        </label>
                        <textarea wire:model="form.notes" rows="3" placeholder="Any special instructions"
                            class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none"></textarea>
                        @error("form.notes")
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <!-- Note: Show only if user is not logged in -->
                    @guest
                        <div class="mt-10 rounded-xl border border-yellow-200 bg-yellow-50 p-4 text-sm text-yellow-800">
                            <p class="font-medium">
                                <strong>Note:</strong> To proceed with your booking, please
                                <a href="{{ route("login") }}" class="font-semibold text-green-700 hover:underline">
                                    sign in
                                </a>
                                or
                                <a href="{{ route("register") }}" class="font-semibold text-green-700 hover:underline">
                                    create an account
                                </a>
                                first.
                            </p>
                        </div>
                    @endguest
            
                    <!-- Book Button: Show only if user IS logged in -->
                    @auth
                        <div class="mt-12 text-center">
                            <a href="#"
                                @click.prevent="showStepper = true; $nextTick(() => window.scrollTo({top: 0, behavior: 'smooth'}))"
                                class="rounded-xl bg-green-600 px-5 py-4 text-sm font-medium text-white shadow-md transition hover:bg-green-700">
                                Book Now
                            </a>
                        </div>
                    @endauth --}}
                    <!-- Submit -->
                    <div class="flex justify-end">
                        <button type="button" wire:click="store"
                            class="rounded-xl bg-teal-500 px-6 py-3 text-white transition hover:bg-teal-600">
                            Request Ambulance
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>

    @push("title")
        {{ @$service->name }}
    @endpush
</div>
