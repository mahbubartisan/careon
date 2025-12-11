<div>

    {{-- <section class="max-w-4xl mx-auto px-4 pb-16 pt-28">
        <!-- Price Calculation Section -->
        <div x-data="{
            location: '',
            packageType: '',
            careLevel: '',
            hours: '',
            locations: {
                dhanmondi: 200,
                mirpur: 300,
                olddhaka: 400,
                gulshan: 350,
                banani: 250
            },
            prices: {
                daily: {
                    basic: { 8: 800, 12: 1100, 24: 2000 },
                    standard: { 8: 1000, 12: 1400, 24: 2500 },
                    critical: { 8: 1300, 12: 1800, 24: 3200 },
                },
                monthly: {
                    basic: { 8: 1800, 12: 2400, 24: 4000 },
                    standard: { 8: 2200, 12: 3200, 24: 4200 },
                    critical: { 8: 3200, 12: 4200, 24: 5200 },
                },
            },
            get basePrice() {
                if (!this.packageType || !this.careLevel || !this.hours) return 0;
                return this.prices?.[this.packageType]?.[this.careLevel]?.[this.hours] || 0;
            },
            get locationCharge() {
                if (!this.location) return 0;
                return this.locations?.[this.location] || 0;
            },
            get total() {
                return (this.basePrice + this.locationCharge) || 0;
            }
        }" class="mt-10 rounded-2xl border bg-white p-8">
            <h3 class="mb-2 text-xl font-semibold text-gray-900 lg:text-2xl">
                Price Calculation
            </h3>
            <p class="mb-4 text-sm text-gray-600">
                Select your preferred options to estimate total cost.
            </p>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
                <!-- Location -->
                <div>
                    <label class="mb-1 block text-sm font-medium leading-none">Location*</label>
                    <select x-model="location" class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none">
                        <option value="" selected="" disabled="" hidden="">
                            Select location
                        </option>
                        <option value="dhanmondi">Dhanmondi</option>
                        <option value="mirpur">Mirpur</option>
                        <option value="olddhaka">Old Dhaka</option>
                        <option value="gulshan">Gulshan</option>
                        <option value="banani">Banani</option>
                    </select>
                </div>

                <!-- Package Type -->
                <div>
                    <label class="mb-1 block text-sm font-medium leading-none">Package Type*</label>
                    <select x-model="packageType"
                        class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none">
                        <option value="" selected="" disabled="" hidden="">
                            Select package type
                        </option>
                        <option value="daily">Daily</option>
                        <option value="monthly">Monthly</option>
                    </select>
                </div>

                <!-- Care Level -->
                <div>
                    <label class="mb-1 block text-sm font-medium leading-none">Care Level*</label>
                    <select x-model="careLevel" class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none">
                        <option value="" selected="" disabled="" hidden="">
                            Select care level
                        </option>
                        <option value="basic">Basic Care</option>
                        <option value="standard">Standard Care</option>
                        <option value="critical">Critical Care</option>
                    </select>
                </div>

                <!-- Available Hours -->
                <div>
                    <label class="mb-1 block text-sm font-medium leading-none">Hours*</label>
                    <select x-model="hours" class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none">
                        <option value="" selected="" disabled="" hidden="">
                            Select hours
                        </option>
                        <option value="8">8 Hours</option>
                        <option value="12">12 Hours</option>
                        <option value="24">24 Hours</option>
                    </select>
                </div>
            </div>

            <!-- Price Summary -->
            <div class="mt-6 space-y-2 border-t pt-4">
                <div class="flex items-center justify-between pt-1">
                    <span class="text-base font-medium text-gray-900">Estimated Total:</span>
                    <span class="text-lg font-semibold text-green-700 transition-all duration-200"
                        x-text="total + '৳'"></span>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="mx-auto max-w-4xl px-4 pb-16 pt-28">
        <!-- Header -->
        <div class="mb-10 text-center">
            <h1 class="mb-2 text-3xl font-bold lg:text-4xl">
                Care That Fits Your Needs — And Your Budget
            </h1>
            <p class="text-lg text-gray-600">
                Get a clear picture of your care expenses before you book.
            </p>
        </div>

        <div x-data="{
            basePrice: @entangle("basePrice"),
            locationCharge: @entangle("locationCharge"),
            get total() {
                return Number(this.basePrice) + Number(this.locationCharge);
            }
        }" class="mt-10 rounded-2xl border bg-white p-8">
            <h3 class="mb-2 text-xl font-semibold">Price Calculation</h3>
            <p class="mb-4 text-sm text-gray-600">Select your preferred options to estimate total cost.</p>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">

                <!-- Location -->
                <div>
                    <label class="mb-1 block text-sm font-medium">Location*</label>
                    <select wire:model.live="selectedLocation"
                        class="w-full rounded-xl border px-3 py-2.5 text-sm focus:border-green-500 focus:outline-none">
                        <option value="">-- Select a Location --</option>
                        @foreach ($locations as $loc)
                            <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Package -->
                <div>
                    <label class="mb-1 block text-sm font-medium">Package*</label>
                    <select wire:model.live="selectedPackage"
                        class="w-full rounded-xl border px-3 py-2.5 text-sm focus:border-green-500 focus:outline-none">
                        <option value="">-- Select a Package --</option>
                        @foreach ($packages as $pkg)
                            <option value="{{ $pkg->id }}">{{ $pkg->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Care Level -->
                <div>
                    <label class="mb-1 block text-sm font-medium">Care Level*</label>
                    <select wire:model.live="selectedCareLevel"
                        class="w-full rounded-xl border px-3 py-2.5 text-sm focus:border-green-500 focus:outline-none">
                        <option value="">-- Select a Care Level --</option>
                        @foreach ($careLevels as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Hours -->
                <div>
                    <label class="mb-1 block text-sm font-medium">Hours*</label>
                    <select wire:model.live="selectedHours"
                        class="w-full rounded-xl border px-3 py-2.5 text-sm focus:border-green-500 focus:outline-none">
                        <option value="">-- Select a Hours --</option>
                        @foreach ($hours as $h)
                            <option value="{{ $h }}">{{ $h }} Hours</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <!-- Total Price -->
            <div class="mt-6 space-y-2 border-t pt-4">
                <div class="flex justify-between">
                    <span class="text-base font-medium text-gray-900">Total Price:</span>

                    <!-- Show total only when all selected, otherwise show 0 -->
                    <span class="text-lg font-semibold text-green-700"
                        x-text="(basePrice > 0 && locationCharge > 0) ? `${total}৳` : '0৳'">
                    </span>
                </div>
            </div>
        </div>
    </section>


    @push("title")
        CareOn - Price Calculator
    @endpush
</div>
