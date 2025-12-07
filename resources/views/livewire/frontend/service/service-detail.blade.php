<div>
    <div x-data="{
        showStepper: false,
        step: 1,
        formData: { location: '', packageType: '', care: '', payment: '' },
        packages: @js($packages),
        service: @js($service),
        locationGroups: @js($locationGroups),
        init() {
            if (this.packages.length > 0) {
                this.formData.packageType = this.packages[0].id; // ← default first tab
            }
        }
    }">
        <!-- SERVICE PAGE CONTENT -->
        <div x-show="!showStepper" y-transition>
            <section class="mx-auto px-4 pb-16 pt-28">
                <!-- Back -->
                <a href="{{ route("frontend.service") }}"
                    class="mb-4 flex items-center text-sm text-gray-600 hover:text-gray-900">
                    <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Services
                </a>

                <div class="mx-auto max-w-4xl">

                    <!-- Label: Service Type -->
                    <span
                        class="mb-3 inline-block rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                        {{ $service->type->name }}
                    </span>

                    <!-- Title -->
                    <h1 class="mb-2 text-3xl font-bold text-gray-900">
                        {{ $service->name }}
                    </h1>

                    <!-- Short Description -->
                    <p class="max-w-3xl text-gray-600">
                        {!! $service->short_desc !!}
                    </p>

                    <!-- CARE LEVELS -->
                    <div class="mt-8 grid gap-6 md:grid-cols-3">
                        @foreach ($service->careLevels as $level)
                            <div
                                class="rounded-2xl border bg-gray-50/20 p-6 transition duration-300 ease-in-out hover:bg-white hover:shadow-[0_0_25px_rgba(0,0,0,0.1)]">

                                <!-- Care Level Name -->
                                <h3 class="mb-2 text-lg font-semibold text-gray-900">
                                    {{ $level->name }}
                                </h3>

                                <!-- Care Level Description -->
                                <div class="mb-4 text-sm text-gray-600">
                                    {!! $level->pivot->description !!}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Available Packages Section -->
                    <div class="mt-12 rounded-2xl border bg-[#F4F8FA] p-8">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900 lg:text-2xl">
                            Available Packages
                        </h3>

                        <p class="mb-4 text-sm text-gray-600">
                            Choose from Daily or Monthly packages with 8, 12 and 24-hours coverage under Basic Care,
                            Standard Care and Critical Care.
                        </p>

                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                            @foreach ($packages as $package)
                                @if (@$package->careLevels->isEmpty())
                                    @continue
                                @endif

                                <div>
                                    <h4 class="mb-2 text-lg font-semibold text-gray-900">
                                        {{ $package->name }}
                                    </h4>

                                    @php
                                        // Build a map: hours => [care level names...]
                                        $hoursMap = [];

                                        foreach (@$package->careLevels as $level) {
                                            foreach (@$level->careOptions as $opt) {
                                                // normalize hour value (int or string)
                                                $hour = (int) $opt->hours;
                                                $hoursMap[$hour][] = $level->name;
                                            }
                                        }

                                        // sort by hour (8,12,24,...)
                                        if (!empty($hoursMap)) {
                                            ksort($hoursMap);
                                        }
                                    @endphp

                                    <ul class="list-inside list-disc space-y-1 text-sm text-gray-700">
                                        @forelse ($hoursMap as $hour => $names)
                                            <li>
                                                {{ $hour }} Hours - {{ collect($names)->unique()->join(" / ") }}
                                            </li>
                                        @empty
                                            <li class="text-sm text-gray-500">No hours available for this package.</li>
                                        @endforelse
                                    </ul>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- Note: Show only if user is not logged in -->
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
                                Book {{ $service->name }} Now
                            </a>
                        </div>
                    @endauth

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

                        <div class="grid grid-cols-1 gap-4 text-sm md:grid-cols-3">

                            <!-- Generate 3 columns -->
                            @php
                                $chunks = $locationGroups->flatMap->locations
                                    ->pluck("name")
                                    ->chunk(ceil($locationGroups->flatMap->locations->count() / 3));
                            @endphp

                            @foreach ($chunks as $col)
                                <div class="space-y-3">
                                    @foreach ($col as $loc)
                                        <label class="flex items-center space-x-2 font-medium">
                                            <input type="radio" name="location" class="form-radio h-4 w-4"
                                                value="{{ $loc }}" x-model="formData.location">
                                            <span>{{ $loc }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            @endforeach

                        </div>

                        <hr class="my-6" />

                        <div class="flex items-center justify-between">
                            <button type="button"
                                @click="
                                            step > 1 ? step-- : showStepper = false;
                                            $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                                        "
                                class="inline-flex items-center rounded-md border px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Back
                            </button>

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
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Package -->
                <div x-show="step === 2" y-transition>
                    <div class="rounded-xl border border-gray-200 bg-white p-8">

                        <h3 class="mb-1 text-xl font-semibold lg:text-xl">
                            Select Package & Care Type
                        </h3>
                        <p class="mb-6 text-sm text-gray-500">Choose daily or monthly, hours, and care level</p>


                        <!-- PACKAGE TABS (dynamic) -->
                        <div class="mb-6 flex gap-2">
                            <template x-for="pkg in packages" :key="pkg.id">
                                <button type="button" @click="formData.packageType = pkg.id"
                                    :class="formData.packageType === pkg.id ?
                                        'bg-green-600 text-white' :
                                        'bg-gray-100 text-gray-900 hover:bg-gray-100'"
                                    class="flex-1 rounded-xl py-2 font-medium transition" x-text="pkg.name">
                                </button>
                            </template>
                        </div>



                        <!-- SELECT CARE LEVEL & HOURS -->
                        <template x-for="pkg in packages" :key="'pkg-' + pkg.id">
                            <div x-show="formData.packageType === pkg.id">

                                <h4 class="mb-3 text-base font-semibold">Select Care Type & Hours</h4>

                                <div class="space-y-5">

                                    <!-- LOOP CARE LEVELS -->
                                    <template x-for="level in pkg.care_levels" :key="'lvl-' + level.id">
                                        <div>

                                            <p class="mb-2 font-semibold text-gray-800" x-text="level.name"></p>

                                            <!-- CARE OPTIONS (hours & price) -->
                                            <div class="grid grid-cols-1 gap-3 lg:grid-cols-3">

                                                <template x-for="opt in level.care_options" :key="'opt-' + opt.id">

                                                    <label
                                                        class="flex cursor-pointer flex-col items-center rounded-lg border px-4 py-3 text-center transition hover:border-green-600"
                                                        :class="formData.care === (level.id + '-' + opt.id) ?
                                                            'border-green-600 bg-green-50' :
                                                            'border-gray-200'">
                                                        <input type="radio" name="care" class="hidden"
                                                            :value="level.id + '-' + opt.id" x-model="formData.care" />

                                                        <span class="font-medium text-gray-800"
                                                            x-text="opt.hours + ' Hours'"></span>

                                                        <span class="text-xs text-gray-500"
                                                            x-text="pkg.name.includes('Monthly') ? 'Per Month' : 'Per Day'">
                                                        </span>

                                                        <span class="mt-1 text-sm font-semibold text-green-600"
                                                            x-text="'৳ ' + opt.price"></span>
                                                    </label>

                                                </template>

                                            </div>

                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>

                        <hr class="my-6" />

                        <!-- BUTTONS -->
                        <div class="mt-8 flex justify-between">

                            <button @click="step--"
                                class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                ← Back
                            </button>

                            <button type="button"
                                @click="
                                    if (formData.care) {
                                        step++;
                                        $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                                    }
                                "
                                :disabled="!formData.care"
                                class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700 disabled:opacity-50">
                                Next
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
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

                <!-- Step 5: Review & Confirm -->
                <div x-show="step === 5" x-transition>
                    <div class="rounded-xl border border-gray-200 bg-white p-8">

                        <!-- Header -->
                        <div class="mb-6">
                            <h2 class="text-xl font-bold text-gray-900 lg:text-2xl">
                                Review & Confirm
                            </h2>
                            <p class="mt-1 text-sm text-gray-500">
                                Please review your booking details
                            </p>
                        </div>

                        <div class="space-y-4 rounded-xl border border-gray-200 p-5 text-sm">
                            <h3 class="mb-4 text-lg font-bold text-gray-900">
                                Booking Summary
                            </h3>

                            <!-- CARE LEVEL & HOURS + PRICE -->
                            <template x-if="formData.care">
                                <div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Service:</span>
                                        {{-- <span class="font-medium text-gray-900"
                                            x-text="
                                                (() => {
                                                    const [lvl, opt] = formData.care.split('-');
                                                    const pkg = packages.find(p => p.id === formData.packageType);
                                                    const level = pkg?.care_levels.find(l => l.id == lvl);
                                                    const option = level?.care_options.find(o => o.id == opt);
                                                    return level?.name + ' - ' + option?.hours + ' Hours';
                                                })()
                                        ">
                                        </span> --}}

                                        <span class="font-medium text-gray-900"
                                            x-text="
                                            (() => {
                                                const [lvl, opt] = formData.care.split('-');

                                                const pkg = packages.find(p => p.id == formData.packageType);
                                                const level = pkg?.care_levels.find(l => l.id == lvl);
                                                const option = level?.care_options.find(o => o.id == opt);

                                                // service.name is available from x-data
                                                return `${service.name} - ${level?.name} (${option?.hours}h)`;
                                            })()
                                        ">
                                        </span>
                                    </div>

                                    {{-- <div class="flex justify-between">
                                        <span class="text-gray-600">Care Charge:</span>
                                        <span class="font-medium text-gray-900"
                                            x-text="
                                (() => {
                                    const [lvl, opt] = formData.care.split('-');
                                    const pkg = packages.find(p => p.id === formData.packageType);
                                    const level = pkg?.care_levels.find(l => l.id == lvl);
                                    const option = level?.care_options.find(o => o.id == opt);
                                    return '৳ ' + option?.price;
                                })()
                        ">
                                        </span>
                                    </div> --}}
                                </div>
                            </template>

                            {{-- <!-- LOCATION -->
                            <div class="flex justify-between">
                                <span class="text-gray-600">Location:</span>
                                <span class="font-medium text-gray-900" x-text="formData.location"></span>
                            </div>

                            <!-- LOCATION GROUP PRICE -->
                            <div class="flex justify-between">
                                <span class="text-gray-600">Location Charge:</span>
                                <span class="font-medium text-gray-900"
                                    x-text="(() => {

                                        if (!formData.location) return '৳ 0';

                                        // Find the group where one of its locations matches the selected name
                                        const group = locationGroups.find(g =>
                                            g.locations.some(loc => loc.name === formData.location)
                                        );

                                        return group ? '৳ ' + group.price : '৳ 0';
                                    })()">
                                </span>

                            </div> --}}


                            <!-- PACKAGE -->
                            <div class="flex justify-between">
                                <span class="text-gray-600">Package:</span>
                                <span class="font-medium text-gray-900"
                                    x-text="packages.find(p => p.id === formData.packageType)?.name">
                                </span>
                            </div>

                            {{-- <!-- DATE -->
                            <div class="flex justify-between">
                                <span class="text-gray-600">Date & Time:</span>
                                <span class="font-medium text-gray-900" x-text="formData.date"></span>
                            </div>

                            <!-- TIME -->
                            <div class="flex justify-between">
                                <span class="text-gray-600">Time:</span>
                                <span class="font-medium text-gray-900" x-text="formData.time"></span>
                            </div> --}}

                            <div class="flex justify-between">
                                <span class="text-gray-600">Date & Time:</span>
                            
                                <span class="font-medium text-gray-900"
                                    x-text="
                                        (() => {
                                            if (!formData.date || !formData.time) return '';
                            
                                            const datetime = new Date(`${formData.date} ${formData.time}`);
                            
                                            const formattedDate = datetime.toLocaleDateString('en-US', {
                                                year: 'numeric',
                                                month: 'long',
                                                day: 'numeric'
                                            });
                            
                                            const formattedTime = datetime.toLocaleTimeString('en-US', {
                                                hour: '2-digit',
                                                minute: '2-digit',
                                                hour12: true
                                            });
                            
                                            return `${formattedDate} • ${formattedTime}`;
                                        })()
                                    ">
                                </span>
                            </div>
                            
                            

                            <!-- ADDRESS -->
                            <div class="flex justify-between">
                                <span class="text-gray-600">Patient Address:</span>
                                <span class="text-right font-medium text-gray-900" x-text="formData.address"></span>
                            </div>

                            <!-- TOTAL PRICE -->
                            <div class="mt-4 flex justify-between border-t pt-4 text-base font-bold text-green-600">
                                <span>Total Price</span>

                                <span
                                    x-text="
                                    (() => {
                                        // -------------------------
                                        // 1. CARE PRICE
                                        // -------------------------
                                        let carePrice = 0;

                                        if (formData.care && formData.packageType) {
                                            const [lvl, opt] = formData.care.split('-');
                                            const pkg = packages.find(p => p.id == formData.packageType);

                                            const level = pkg?.care_levels.find(l => l.id == lvl);
                                            const option = level?.care_options.find(o => o.id == opt);

                                            carePrice = option?.price ?? 0;
                                        }

                                        // -------------------------
                                        // 2. LOCATION PRICE
                                        // -------------------------
                                        let locationPrice = 0;

                                        if (formData.location) {
                                            // Find the group containing the selected location
                                            const group = locationGroups.find(g =>
                                                g.locations.some(loc => loc.name === formData.location)
                                            );

                                            locationPrice = group ? group.price : 0;
                                        }

                                        // -------------------------
                                        // 3. TOTAL
                                        // -------------------------
                                        return '৳ ' + (carePrice + locationPrice);
                                    })()
                                ">
                                </span>
                            </div>

                        </div>

                        <div class="mt-6 flex justify-between">
                            <button @click="step--"
                                class="rounded-md border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                ← Back
                            </button>

                            <button class="rounded-md bg-green-600 px-5 py-2 text-sm text-white hover:bg-green-700">
                                Confirm Booking →
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

                            <!-- Cash On Delivery -->
                            <label
                                class="flex cursor-pointer items-center rounded-xl border px-4 py-3 transition hover:border-green-600"
                                :class="formData.payment === 'COD' ? 'border-green-600 bg-green-50' : 'border-gray-200'">
                                <input type="radio" name="payment" value="COD" x-model="formData.payment"
                                    class="mr-3 text-green-600 focus:ring-0" />
                                <span class="font-medium text-gray-800">Cash On Delivery</span>
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
                            <button type="button" wire:click="processOrder"
                                class="rounded-xl bg-green-600 px-5 py-2 text-white">
                                Confirm Payment & Book
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push("title")
        {{ $service->name }}
    @endpush
</div>
