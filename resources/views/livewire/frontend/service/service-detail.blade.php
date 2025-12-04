<div>
    <div x-data="{
        showStepper: false,
        step: 1,
        formData: { location: '', packageType: '', care: '', payment: 'bkash' },
        init() {
            // Automatically set first tab (Daily Package) active on load
            this.formData.packageType = ['Daily Package', 'Monthly Package'][0];
        }
    }">
        <!-- SERVICE PAGE CONTENT -->
        <div x-show="!showStepper" y-transition>
            <section class="mx-auto px-4 pb-16 pt-28">
                <!-- Back -->
                <a href="services.html" class="mb-4 flex items-center text-sm text-gray-600 hover:text-gray-900">
                    <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Services
                </a>

                <div class="mx-auto max-w-4xl">
                    <!-- Label -->
                    <span
                        class="mb-3 inline-block rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                        Special Healthcare Services
                    </span>

                    <!-- Title -->
                    <h1 class="mb-2 text-3xl font-bold text-gray-900">
                        Nursing Care Service
                    </h1>
                    <p class="max-w-3xl text-gray-600">
                        Professional registered nurses providing comprehensive home
                        healthcare with 8/12/24 hour coverage options for daily or monthly
                        engagements.
                    </p>

                    <!-- Care Types -->
                    <div class="mt-8 grid gap-6 md:grid-cols-3">
                        <!-- Basic Care -->
                        <div
                            class="rounded-2xl border bg-gray-50/20 p-6 transition duration-300 ease-in-out hover:cursor-pointer hover:bg-white hover:shadow-[0_0_25px_rgba(0,0,0,0.1)]">
                            <h3 class="mb-2 text-lg font-semibold text-gray-900">
                                Basic Care
                            </h3>
                            <p class="mb-4 text-sm text-gray-600">
                                Essential nursing support for stable patients requiring
                                routine monitoring and basic medical assistance.
                            </p>
                            <ul class="mt-4 space-y-2 text-sm text-gray-700">
                                <li class="flex items-start">
                                    <svg class="mr-2 mt-1 h-4 w-4 flex-shrink-0 text-emerald-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Vital signs monitoring (BP, temperature, pulse)
                                </li>
                                <li class="flex items-start">
                                    <svg class="mr-2 mt-1 h-4 w-4 flex-shrink-0 text-emerald-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Wound care & dressing changes
                                </li>
                                <li class="flex items-start">
                                    <svg class="mr-2 mt-1 h-4 w-4 flex-shrink-0 text-emerald-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Patient hygiene & comfort care
                                </li>
                            </ul>
                        </div>

                        <!-- Standard Care -->
                        <div
                            class="rounded-2xl border bg-gray-50/20 p-6 transition duration-300 ease-in-out hover:cursor-pointer hover:bg-white hover:shadow-[0_0_25px_rgba(0,0,0,0.1)]">
                            <h3 class="mb-2 text-lg font-semibold text-gray-900">
                                Standard Care
                            </h3>
                            <p class="mb-4 text-sm text-gray-600">
                                Comprehensive care for patients with moderate medical needs,
                                including medication management, vital monitoring, and regular
                                assessments.
                            </p>
                            <ul class="mt-4 space-y-2 text-sm text-gray-700">
                                <li class="flex items-start">
                                    <svg class="mr-2 mt-1 h-4 w-4 flex-shrink-0 text-emerald-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    IV therapy & injections
                                </li>
                                <li class="flex items-start">
                                    <svg class="mr-2 mt-1 h-4 w-4 flex-shrink-0 text-emerald-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Medication administration & management
                                </li>
                                <li class="flex items-start">
                                    <svg class="mr-2 mt-1 h-4 w-4 flex-shrink-0 text-emerald-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Post-operative care & recovery support
                                </li>
                            </ul>
                        </div>

                        <!-- Critical Care -->
                        <div
                            class="rounded-2xl border bg-gray-50/20 p-6 transition duration-300 ease-in-out hover:cursor-pointer hover:bg-white hover:shadow-[0_0_25px_rgba(0,0,0,0.1)]">
                            <h3 class="mb-2 text-lg font-semibold text-gray-900">
                                Critical Care
                            </h3>
                            <p class="mb-4 text-sm text-gray-600">
                                Intensive nursing care for patients with complex medical
                                conditions requiring continuous monitoring, specialized
                                equipment, and advanced clinical skills.
                            </p>
                            <ul class="mt-4 space-y-2 text-sm text-gray-700">
                                <li class="flex items-start">
                                    <svg class="mr-2 mt-1 h-4 w-4 flex-shrink-0 text-emerald-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Catheter & tube management
                                </li>
                                <li class="flex items-start">
                                    <svg class="mr-2 mt-1 h-4 w-4 flex-shrink-0 text-emerald-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Oxygen & ventilator support
                                </li>
                                <li class="flex items-start">
                                    <svg class="mr-2 mt-1 h-4 w-4 flex-shrink-0 text-emerald-600" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Documentation & medical record keeping
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Available Packages Section -->
                    <div class="mt-12 rounded-2xl border bg-[#F4F8FA] p-8">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900 lg:text-2xl">
                            Available Packages
                        </h3>
                        <p class="mb-4 text-sm text-gray-600">
                            Choose from Daily or Monthly packages with 8, 12 and 24-hours
                            coverage under Basic Care, Standard Care and Critical Care.
                        </p>
                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                            <div>
                                <h4 class="mb-2 text-lg font-semibold text-gray-900">
                                    Daily Package
                                </h4>
                                <ul class="list-inside list-disc space-y-1 text-sm text-gray-700">
                                    <li>
                                        8 Hours - Basic Care / Standard Care / Critical Care
                                    </li>
                                    <li>
                                        12 Hours - Basic Care / Standard Care / Critical Care
                                    </li>
                                    <li>
                                        24 Hours - Basic Care / Standard Care / Critical Care
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="mb-2 text-lg font-semibold text-gray-900">
                                    Monthly Package
                                </h4>
                                <ul class="list-inside list-disc space-y-1 text-sm text-gray-700">
                                    <li>
                                        8 Hours - Basic Care / Standard Care / Critical Care
                                    </li>
                                    <li>
                                        12 Hours - Basic Care / Standard Care / Critical Care
                                    </li>
                                    <li>
                                        24 Hours - Basic Care / Standard Care / Critical Care
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

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
                                <label class="mb-1 block text-sm font-medium leading-none">Location</label>
                                <select x-model="location"
                                    class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none">
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
                                <label class="mb-1 block text-sm font-medium leading-none">Package Type</label>
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
                                <label class="mb-1 block text-sm font-medium leading-none">Care Level</label>
                                <select x-model="careLevel"
                                    class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none">
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
                                <label class="mb-1 block text-sm font-medium leading-none">Hours</label>
                                <select x-model="hours"
                                    class="w-full rounded-xl border px-3 py-2.5 text-sm focus:outline-none">
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
                            <!-- <div class="flex justify-between text-sm text-gray-600">
                                <span>Base Price:</span>
                                <span x-text="basePrice + '৳'"></span>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Location Charge:</span>
                                <span x-text="locationCharge + '৳'"></span>
                            </div> -->
                            <div class="flex items-center justify-between pt-1">
                                <span class="text-base font-semibold text-gray-900">Estimated Total:</span>
                                <span class="text-xl font-bold text-green-600 transition-all duration-200"
                                    x-text="total + '৳'"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <!-- <div class="mt-16 text-center">
          <a
            href="#"
            class="rounded-xl bg-green-600 px-6 py-3 text-sm font-medium text-white shadow-md transition hover:bg-green-700"
            >Book Nursing Care Now</a
          >
        </div> -->

                    <!-- Note: Sign in / Sign up before booking -->
                    <div class="mt-10 rounded-xl border border-yellow-200 bg-yellow-50 p-4 text-sm text-yellow-800">
                        <p class="font-medium">
                            <strong>Note:</strong> To proceed with your booking, please
                            <a href="{{ route("login") }}" class="font-semibold text-green-700 hover:underline">sign
                                in</a>
                            or
                            <a href="{{ route("login") }}" class="font-semibold text-green-700 hover:underline">create
                                an account</a>
                            first.
                        </p>
                    </div>

                    <!-- Book Button -->
                    <div class="mt-12 text-center">
                        <a href="#"
                            @click.prevent="showStepper = true; $nextTick(() => window.scrollTo({top: 0, behavior: 'smooth'}))"
                            class="rounded-xl bg-green-600 px-6 py-3 text-sm font-medium text-white shadow-md transition hover:bg-green-700">
                            Book Nursing Care Now
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <!-- MULTI-STEP FORM SECTION -->
        <div x-show="showStepper" y-transition>
            <div class="mx-auto mt-8 max-w-4xl px-4 py-16">
                <!-- Stepper Navigation -->
                <nav class="mb-8 flex items-center justify-between text-xs text-gray-500">
                    <div class="flex-1">
                        <ul class="flex items-center justify-between">
                            <template x-for="n in 6" :key="n">
                                <li class="flex items-center space-x-2">
                                    <span class="flex h-6 w-6 items-center justify-center rounded-full text-[10px]"
                                        :class="{
                                            'bg-green-600 text-white': step >= n,
                                            'border border-gray-200 text-gray-400': step < n
                                        }"
                                        x-text="n"></span>
                                    <span class="hidden sm:inline"
                                        x-text="['Location','Package','Schedule','Address','Review','Payment'][n-1]"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                </nav>

                <!-- Step 1: Location -->
                <div x-show="step === 1" y-transition>
                    <div class="rounded-xl border border-gray-200 bg-white p-8">
                        <h3 class="mb-1 text-xl font-semibold lg:text-2xl">
                            Select Your Location in Dhaka
                        </h3>
                        <p class="mb-6 text-sm text-gray-500">
                            Choose your area to proceed
                        </p>

                        <form>
                            <div class="grid grid-cols-1 gap-4 text-sm md:grid-cols-3">
                                <!-- Column 1 -->
                                <div class="space-y-3">
                                    <template
                                        x-for="(loc, i) in ['Dhanmondi - Part 01 (Road 1-27)','Gulshan','Banani','Baridhara','Bashundhara','Uttara','Niketan','Mirpur (DOHS)','Mohakhali (DOHS)','Baridhara (DOHS)']"
                                        :key="i">
                                        <label class="flex items-center space-x-2 font-medium">
                                            <input type="radio" name="location" class="form-radio h-4 w-4"
                                                :value="loc" x-model="formData.location" />
                                            <span x-text="loc"></span>
                                        </label>
                                    </template>
                                </div>

                                <!-- Column 2 -->
                                <div class="space-y-3">
                                    <template
                                        x-for="(loc, i) in ['Mirpur','Mohammadpur','Shyamoli','Gabtoli','Farmgate','Mohakhali','Savar','Sher-e-Bangla Nagar','Agargaon','Zigatola']"
                                        :key="'b' + i">
                                        <label class="flex items-center space-x-2 font-medium">
                                            <input type="radio" name="location" class="form-radio h-4 w-4"
                                                :value="loc" x-model="formData.location" />
                                            <span x-text="loc"></span>
                                        </label>
                                    </template>
                                </div>

                                <!-- Column 3 -->
                                <div class="space-y-3">
                                    <template
                                        x-for="(loc, i) in ['Rampura','Badda','Tejgaon','Motijheel','Chawkbazar','Ramna','Malibagh','Jatrabari','Old Dhaka']"
                                        :key="'c' + i">
                                        <label class="flex items-center space-x-2 font-medium">
                                            <input type="radio" name="location" class="form-radio h-4 w-4"
                                                :value="loc" x-model="formData.location" />
                                            <span x-text="loc"></span>
                                        </label>
                                    </template>
                                </div>
                            </div>

                            <hr class="my-6" />

                            <div class="flex items-center justify-between">
                                <!-- Back Button -->
                                <button type="button"
                                    @click="
                      step > 1 ? step-- : showStepper = false;
                      $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                    "
                                    class="inline-flex items-center rounded-md border px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                    Back
                                </button>

                                <!-- Next Button -->
                                <button type="button"
                                    @click="
                      if (formData.location) {
                        step++;
                        $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                      }
                    "
                                    :disabled="!formData.location"
                                    class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700 disabled:opacity-50">
                                    Next
                                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Step 2: Package -->
                <div x-show="step === 2" y-transition>
                    <div class="rounded-xl border border-gray-200 bg-white p-8">
                        <h3 class="mb-1 text-xl font-semibold lg:text-xl">
                            Select Package & Care Type
                        </h3>
                        <p class="mb-6 text-sm text-gray-500">
                            Choose daily or monthly, hours, and care level
                        </p>

                        <!-- Toggle Buttons -->
                        <div class="mb-6 flex gap-2">
                            <template x-for="(tab, index) in ['Daily Package', 'Monthly Package']"
                                :key="index">
                                <button type="button" @click="formData.packageType = tab"
                                    :class="formData.packageType === tab ?
                                        'bg-green-600 text-white' :
                                        'bg-gray-100 text-gray-900 hover:bg-gray-100'"
                                    class="flex-1 rounded-xl py-2 font-medium transition" x-text="tab"></button>
                            </template>
                        </div>

                        <!-- Care Type & Hours -->
                        <template x-if="formData.packageType === 'Daily Package'">
                            <div>
                                <h4 class="mb-3 text-base font-semibold">
                                    Select Care Type & Hours
                                </h4>

                                <div class="space-y-3">
                                    <!-- Basic Care -->
                                    <div>
                                        <p class="mb-2 font-semibold text-gray-800">Basic Care</p>
                                        <div class="grid grid-cols-1 gap-3 lg:grid-cols-3">
                                            <template x-for="(hour, i) in ['8 Hours', '12 Hours', '24 Hours']"
                                                :key="'basic' + i">
                                                <label
                                                    class="flex cursor-pointer flex-col items-center rounded-lg border px-4 py-3 text-center transition hover:border-green-600"
                                                    :class="formData.care === 'Basic-' + hour ?
                                                        'border-green-600 bg-green-50' : 'border-gray-200'">
                                                    <input type="radio" name="care" class="hidden"
                                                        :value="'Basic-' + hour" x-model="formData.care" />
                                                    <span class="font-medium text-gray-800" x-text="hour"></span>
                                                    <span class="text-xs text-gray-500">Per Day</span>
                                                </label>
                                            </template>
                                        </div>
                                    </div>

                                    <!-- Standard Care -->
                                    <div>
                                        <p class="mb-2 font-semibold text-gray-800">
                                            Standard Care
                                        </p>
                                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                                            <template x-for="(hour, i) in ['8 Hours', '12 Hours', '24 Hours']"
                                                :key="'standard' + i">
                                                <label
                                                    class="flex cursor-pointer flex-col items-center rounded-lg border px-4 py-3 text-center transition hover:border-green-600"
                                                    :class="formData.care === 'Standard-' + hour ?
                                                        'border-green-600 bg-green-50' : 'border-gray-200'">
                                                    <input type="radio" name="care" class="hidden"
                                                        :value="'Standard-' + hour" x-model="formData.care" />
                                                    <span class="font-medium text-gray-800" x-text="hour"></span>
                                                    <span class="text-xs text-gray-500">Per Day</span>
                                                </label>
                                            </template>
                                        </div>
                                    </div>

                                    <!-- Critical Care -->
                                    <div>
                                        <p class="mb-2 font-semibold text-gray-800">
                                            Critical Care
                                        </p>
                                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                                            <template x-for="(hour, i) in ['8 Hours', '12 Hours', '24 Hours']"
                                                :key="'critical' + i">
                                                <label
                                                    class="flex cursor-pointer flex-col items-center rounded-lg border px-4 py-3 text-center transition hover:border-green-600"
                                                    :class="formData.care === 'Critical-' + hour ?
                                                        'border-green-600 bg-green-50' : 'border-gray-200'">
                                                    <input type="radio" name="care" class="hidden"
                                                        :value="'Critical-' + hour" x-model="formData.care" />
                                                    <span class="font-medium text-gray-800" x-text="hour"></span>
                                                    <span class="text-xs text-gray-500">Per Day</span>
                                                </label>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <!-- Monthly Package -->
                        <template x-if="formData.packageType === 'Monthly Package'">
                            <div>
                                <h4 class="mb-3 text-base font-semibold">
                                    Select Care Type & Duration
                                </h4>

                                <div class="space-y-5">
                                    <!-- Basic Care -->
                                    <div>
                                        <p class="mb-2 font-semibold text-gray-800">Basic Care</p>
                                        <div class="grid grid-cols-1 gap-3 lg:grid-cols-3">
                                            <template x-for="(hour, i) in ['8 Hours', '12 Hours', '24 Hours']"
                                                :key="'basic' + i">
                                                <label
                                                    class="flex cursor-pointer flex-col items-center rounded-lg border px-4 py-3 text-center transition hover:border-green-600"
                                                    :class="formData.care === 'Basic-' + hour ?
                                                        'border-green-600 bg-green-50' : 'border-gray-200'">
                                                    <input type="radio" name="care" class="hidden"
                                                        :value="'Basic-' + hour" x-model="formData.care" />
                                                    <span class="font-medium text-gray-800" x-text="hour"></span>
                                                    <span class="text-xs text-gray-500">Per Month</span>
                                                </label>
                                            </template>
                                        </div>
                                    </div>

                                    <!-- Standard Care -->
                                    <div>
                                        <p class="mb-2 font-semibold text-gray-800">
                                            Standard Care
                                        </p>
                                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                                            <template x-for="(hour, i) in ['8 Hours', '12 Hours', '24 Hours']"
                                                :key="'standard' + i">
                                                <label
                                                    class="flex cursor-pointer flex-col items-center rounded-lg border px-4 py-3 text-center transition hover:border-green-600"
                                                    :class="formData.care === 'Standard-' + hour ?
                                                        'border-green-600 bg-green-50' : 'border-gray-200'">
                                                    <input type="radio" name="care" class="hidden"
                                                        :value="'Standard-' + hour" x-model="formData.care" />
                                                    <span class="font-medium text-gray-800" x-text="hour"></span>
                                                    <span class="text-xs text-gray-500">Per Month</span>
                                                </label>
                                            </template>
                                        </div>
                                    </div>

                                    <!-- Critical Care -->
                                    <div>
                                        <p class="mb-2 font-semibold text-gray-800">
                                            Critical Care
                                        </p>
                                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                                            <template x-for="(hour, i) in ['8 Hours', '12 Hours', '24 Hours']"
                                                :key="'critical' + i">
                                                <label
                                                    class="flex cursor-pointer flex-col items-center rounded-lg border px-4 py-3 text-center transition hover:border-green-600"
                                                    :class="formData.care === 'Critical-' + hour ?
                                                        'border-green-600 bg-green-50' : 'border-gray-200'">
                                                    <input type="radio" name="care" class="hidden"
                                                        :value="'Critical-' + hour" x-model="formData.care" />
                                                    <span class="font-medium text-gray-800" x-text="hour"></span>
                                                    <span class="text-xs text-gray-500">Per Month</span>
                                                </label>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <hr class="my-6" />

                        <!-- Navigation -->
                        <div class="mt-8 flex justify-between">
                            <!-- Back Button -->
                            <button
                                @click="
      step--;
      $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
    "
                                class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                ← Back
                            </button>

                            <!-- Next Button -->
                            <button
                                @click="
      if (formData.care) {
        step++;
        $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
      }
    "
                                :disabled="!formData.care"
                                class="rounded-md bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700 disabled:opacity-50">
                                Next →
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Schedule -->
                <div x-show="step === 3" y-transition>
                    <div class="rounded-xl border border-gray-200 bg-white p-8">
                        <h3 class="mb-1 text-xl font-bold lg:text-2xl">Schedule</h3>
                        <p class="mb-6 text-sm text-gray-500">
                            Choose your preferred schedule
                        </p>

                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-sm">Select Date</label>
                                <input type="date" x-model="formData.date"
                                    class="w-full rounded-xl border px-3 py-2 text-sm" />
                            </div>
                            <div>
                                <label class="mb-1 block text-sm">Preferred Time</label>
                                <input type="time" x-model="formData.time"
                                    class="w-full rounded-xl border px-3 py-2 text-sm" />
                            </div>
                        </div>

                        <hr class="my-6" />

                        <div class="mt-6 flex justify-between">
                            <!-- Back Button -->
                            <button
                                @click="
                    step--;
                    $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                  "
                                class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                ← Back
                            </button>

                            <!-- Next Button -->
                            <button
                                @click="
                    step++;
                    $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                  "
                                class="rounded-md bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700">
                                Next →
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Address -->
                <div x-show="step === 4" y-transition>
                    <div class="rounded-xl border border-gray-200 bg-white p-8">
                        <!-- Title -->
                        <h3 class="ext-xl mb-1 font-bold lg:text-2xl">
                            Complete Address
                        </h3>
                        <p class="mb-6 text-sm text-gray-500">
                            Provide detailed address information
                        </p>

                        <!-- Address Form -->
                        <div class="space-y-5">
                            <!-- Patient Name & Gender  -->
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <!-- Patient Name  -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Patient Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" placeholder="Enter patient name"
                                        x-model="formData.patientName"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none" />
                                </div>

                                <!-- Gender -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">
                                        Gender <span class="text-red-500">*</span>
                                    </label>
                                    <div class="grid grid-cols-3 gap-2">
                                        <!-- Male -->
                                        <label class="relative">
                                            <input type="radio" name="gender" x-model="formData.gender"
                                                value="male" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Male
                                            </div>
                                        </label>

                                        <!-- Female -->
                                        <label class="relative">
                                            <input type="radio" name="gender" x-model="formData.gender"
                                                value="female" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Female
                                            </div>
                                        </label>

                                        <!-- Others -->
                                        <label class="relative">
                                            <input type="radio" name="gender" x-model="formData.gender"
                                                value="others" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Others
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Height & Weight -->
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Height <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" placeholder="Height" x-model="formData.height"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none" />
                                </div>
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Weight <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" placeholder="Weight" x-model="formData.wight"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none" />
                                </div>
                            </div>

                            <!-- Patient Type & Country  -->
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <!-- Type -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">
                                        Patient Type <span class="text-red-500">*</span>
                                    </label>
                                    <div class="grid grid-cols-2 gap-2 sm:grid-cols-3">
                                        <!-- Bangladeshi -->
                                        <label class="relative">
                                            <input type="radio" name="patientType" x-model="formData.patientType"
                                                value="Bangladeshi" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Bangladeshi
                                            </div>
                                        </label>

                                        <!-- Foreigner -->
                                        <label class="relative">
                                            <input type="radio" name="patientType" x-model="formData.patientType"
                                                value="Foreigner" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Foreigner
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Country  -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Country
                                        <span class="text-xs font-normal text-gray-500">(If foreigner, please enter
                                            your country name)</span></label>
                                    <input type="text" placeholder="Enter country name" x-model="formData.country"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none" />
                                </div>
                            </div>

                            <!-- Contact Phones -->
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Patient Contact
                                        <span class="text-red-500">*</span></label>
                                    <input type="text" placeholder="+880 1XXX-XXXXXX"
                                        x-model="formData.patientContact"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none" />
                                </div>
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">Emergency Contact
                                        <span class="text-red-500">*</span></label>
                                    <input type="text" placeholder="+880 1XXX-XXXXXX"
                                        x-model="formData.emergencyContact"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none" />
                                </div>
                            </div>

                            <!-- Full Address -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">Full Address <span
                                        class="text-red-500">*</span></label>
                                <textarea x-model="formData.address" rows="3" placeholder="House/Flat number, Road, Block"
                                    class="w-full resize-none rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none"></textarea>
                            </div>

                            <!-- Preferences -->
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <!-- Gender Preference -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">
                                        Gender Preference
                                    </label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <!-- Male Nurse -->
                                        <label class="relative">
                                            <input type="radio" name="genderPreference"
                                                x-model="formData.genderPreference" value="Male Nurse"
                                                class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Male Nurse
                                            </div>
                                        </label>

                                        <!-- Female Nurse -->
                                        <label class="relative">
                                            <input type="radio" name="genderPreference"
                                                x-model="formData.genderPreference" value="Female Nurse"
                                                class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Female Nurse
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Language Preference  -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-700">
                                        Language Preference
                                    </label>
                                    <div class="grid grid-cols-3 gap-2">
                                        <!-- Bengali -->
                                        <label class="relative">
                                            <input type="radio" name="language" x-model="formData.language"
                                                value="Bengali" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Bengali
                                            </div>
                                        </label>

                                        <!-- English -->
                                        <label class="relative">
                                            <input type="radio" name="language" x-model="formData.language"
                                                value="English" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                English
                                            </div>
                                        </label>

                                        <!-- Both -->
                                        <label class="relative">
                                            <input type="radio" name="language" x-model="formData.language"
                                                value="Both" class="peer hidden" />
                                            <div
                                                class="flex cursor-pointer items-center justify-center rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition-all peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                                                Both
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Special Instructions -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">Special Instructions
                                    <span class="text-xs font-normal text-gray-500">(if any)</span>
                                </label>
                                <textarea rows="3" placeholder="Any medical conditions, allergies, or specific requirements..."
                                    x-model="formData.specialInstructions"
                                    class="w-full resize-none rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-600 focus:outline-none"></textarea>
                            </div>

                            <!-- Use Current Location Button -->
                            <!-- <div class="flex items-center justify-between">
                  <button
                    type="button"
                    @click="getCurrentLocation()"
                    class="flex w-full items-center justify-center gap-2 rounded-md border border-gray-300 px-4 py-2.5 text-sm text-gray-700 transition hover:bg-gray-50 sm:w-auto"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-4 w-4 text-green-600"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 2v2m0 16v2m10-10h-2M4 12H2m15.364-7.364l-1.414 1.414M6.05 17.95l-1.414 1.414M17.95 17.95l1.414 1.414M6.05 6.05L4.636 4.636M12 8a4 4 0 110 8 4 4 0 010-8z"
                      />
                    </svg>
                    Use Current Location
                  </button>
                </div> -->
                        </div>

                        <!-- Divider -->
                        <hr class="my-6" />

                        <!-- Navigation Buttons -->
                        <div class="flex justify-between">
                            <!-- Back Button -->
                            <button
                                @click="
                    step--;
                    $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                  "
                                class="flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                ← Back
                            </button>

                            <!-- Next Button -->
                            <!-- <button
                  @click="
                    if (formData.address && formData.contactPhone) {
                      step++;
                      $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                    }
                  "
                  :disabled="!formData.address || !formData.contactPhone"
                  class="flex items-center rounded-md bg-green-600 px-5 py-2 text-sm text-white hover:bg-green-700 disabled:opacity-50"
                >
                  Next →
                </button> -->
                            <button
                                @click="
                      step++;
                      $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                    
                  "
                                class="flex items-center rounded-md bg-green-600 px-5 py-2 text-sm text-white hover:bg-green-700 disabled:opacity-50">
                                Next →
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 5 (Review) -->
                <div x-show="step === 5" y-transition>
                    <div x-data="{ agree: false }" class="rounded-xl border border-gray-200 bg-white p-8">
                        <!-- Header -->
                        <div class="mb-6">
                            <h2 class="text-xl font-bold text-gray-900 lg:text-2xl">
                                Review & Confirm
                            </h2>
                            <p class="mt-1 text-sm text-gray-500">
                                Please review your booking details
                            </p>
                        </div>

                        <!-- Booking Summary -->
                        <div class="mb-6 rounded-xl border border-gray-200 p-5">
                            <h3 class="mb-4 text-lg font-bold text-gray-900">
                                Booking Summary
                            </h3>
                            <div class="grid grid-cols-2 text-sm">
                                <div class="space-y-2 text-gray-600">
                                    <p>Service:</p>
                                    <p>Package:</p>
                                    <p>Location:</p>
                                    <p>Date & Time:</p>
                                </div>
                                <div class="space-y-2 text-right font-medium text-gray-900">
                                    <p>Nursing Care - basic (8h)</p>
                                    <p>Daily</p>
                                    <p>Old Dhaka</p>
                                    <p>Not selected -</p>
                                </div>
                            </div>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="mb-8 rounded-xl border border-emerald-300 bg-emerald-50/30 p-5">
                            <h3 class="mb-3 text-lg font-bold text-gray-900">
                                Terms & Conditions
                            </h3>
                            <ul class="list-inside list-disc space-y-1 text-sm text-gray-600">
                                <li>
                                    I authorize CareOn-verified professionals to enter the
                                    specified address for the booked service time.
                                </li>
                                <li>
                                    I agree to provide a safe working environment and comply
                                    with all safety guidelines.
                                </li>
                                <li>
                                    I understand the cancellation policy and refund terms as per
                                    CareOn policies.
                                </li>
                                <li>
                                    All personal and medical information will be kept
                                    confidential.
                                </li>
                                <li>
                                    I confirm that all information provided is accurate and
                                    complete.
                                </li>
                            </ul>

                            <div class="mt-4 flex items-center space-x-2 text-sm">
                                <input id="agree" type="checkbox" x-model="agree"
                                    class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" />
                                <label for="agree" class="text-gray-700">
                                    I have read and agree to the terms and conditions
                                </label>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-between border-t pt-4">
                            <!-- <button
                  class="flex items-center gap-2 rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 transition hover:bg-gray-100"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 19l-7-7 7-7"
                    />
                  </svg>
                  Back
                </button> -->
                            <button
                                @click="
                    step--;
                    $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                  "
                                class="flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                Back
                            </button>

                            <!-- <a
                  href="confirmation.html"
                  :disabled="!agree"
                  :class="agree ? 'bg-emerald-600 hover:bg-emerald-700 text-white' :
                      'bg-emerald-300 text-white cursor-not-allowed'"
                  class="rounded-lg px-5 py-2 text-sm transition"
                >
                  Confirm Booking
                </a> -->
                            <!-- Next Button -->
                            <button
                                @click="
                  if (agree) {
                    step++;
                    $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                  }
                "
                                :disabled="!agree"
                                :class="agree
                                    ?
                                    'flex items-center bg-green-600 hover:bg-green-700 text-white' :
                                    'flex items-center bg-green-300 text-white cursor-not-allowed'"
                                class="rounded-lg px-5 py-2 text-sm transition">
                                Confirm & Next →
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 6: Payment Method -->
                <div x-show="step === 6" y-transition>
                    <div class="rounded-xl border border-gray-200 bg-white p-8">
                        <!-- Header -->
                        <h3 class="mb-1 text-xl font-bold lg:text-2xl">Payment Method</h3>
                        <p class="mb-6 text-sm text-gray-500">
                            How would you like to pay?
                        </p>

                        <!-- Payment Options -->
                        <div class="space-y-3">
                            <!-- bKash -->
                            <label
                                class="flex cursor-pointer items-center justify-between rounded-xl border px-4 py-3 transition hover:border-green-600"
                                :class="formData.payment === 'bkash' ? 'border-green-600 bg-green-50' : 'border-gray-200'">
                                <div class="flex items-center space-x-3">
                                    <input type="radio" name="payment" value="bkash" x-model="formData.payment"
                                        class="text-green-600 focus:ring-0" />
                                    <span class="font-medium text-gray-800">bKash</span>
                                </div>
                                <span
                                    class="rounded-full bg-green-100 px-2 py-0.5 text-[11px] font-medium text-green-700">Popular</span>
                            </label>

                            <!-- Nagad -->
                            <label
                                class="flex cursor-pointer items-center rounded-xl border px-4 py-3 transition hover:border-green-600"
                                :class="formData.payment === 'nagad' ? 'border-green-600 bg-green-50' : 'border-gray-200'">
                                <input type="radio" name="payment" value="nagad" x-model="formData.payment"
                                    class="mr-3 text-green-600 focus:ring-0" />
                                <span class="font-medium text-gray-800">Nagad</span>
                            </label>

                            <!-- Credit/Debit Card -->
                            <label
                                class="flex cursor-pointer items-center rounded-xl border px-4 py-3 transition hover:border-green-600"
                                :class="formData.payment === 'card' ? 'border-green-600 bg-green-50' : 'border-gray-200'">
                                <input type="radio" name="payment" value="card" x-model="formData.payment"
                                    class="mr-3 text-green-600 focus:ring-0" />
                                <span class="font-medium text-gray-800">Credit/Debit Card</span>
                            </label>

                            <!-- Cash on Service -->
                            <label
                                class="flex cursor-pointer items-center rounded-xl border px-4 py-3 transition hover:border-green-600"
                                :class="formData.payment === 'cash' ? 'border-green-600 bg-green-50' : 'border-gray-200'">
                                <input type="radio" name="payment" value="cash" x-model="formData.payment"
                                    class="mr-3 text-green-600 focus:ring-0" />
                                <span class="font-medium text-gray-800">Cash on Service</span>
                            </label>
                        </div>

                        <!-- Divider -->
                        <hr class="my-6" />

                        <!-- Navigation Buttons -->
                        <div class="flex justify-between">
                            <!-- Back Button -->
                            <button
                                @click="
                    step--;
                    $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                  "
                                class="flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                ← Back
                            </button>

                            <!-- Next Button -->
                            <!-- <button
                  @click="
                    step++;
                    $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                  "
                  class="flex items-center rounded-md bg-green-600 px-5 py-2 text-sm text-white hover:bg-green-700"
                >
                  Next →
                </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push("title")
        CareOn - Service Detail
    @endpush
</div>
