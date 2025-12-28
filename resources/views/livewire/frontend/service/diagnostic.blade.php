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
                {{ optional($service->type)->name }}
            </span>

            <!-- Title -->
            <h1 class="mb-2 text-3xl font-bold text-gray-900">
                {{ $service->name }}
            </h1>

            <!-- Short Description -->
            <p class="max-w-7xl text-gray-600">
                {{ $service->short_desc }}
            </p>
        </div>

        {{-- <div x-data="{ step: 1 }" class="mx-auto max-w-7xl py-8">

            <!-- ================= STEP 1 : TEST + LAB ================= -->
            <div x-show="step === 1" y-transition class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                <!-- LEFT: TEST LIST -->
                <div class="rounded-xl border border-gray-200 bg-white p-6 lg:col-span-2">

                    <h2 class="mb-4 text-xl font-semibold">All Diagnostics Tests</h2>

                    <!-- Search -->
                    <div class="relative mb-6">
                        <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35m1.85-5.65a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                        </svg>

                        <input type="text" placeholder="Search test..."
                            class="w-full rounded-xl border py-4 pl-12 pr-4 text-sm focus:border-teal-500 focus:outline-none" />
                    </div>

                    <!-- Test Items -->
                    <div class="space-y-3">

                        <label class="block cursor-pointer">
                            <input type="checkbox" class="peer hidden">
                            <div
                                class="relative rounded-xl border p-4 transition hover:bg-teal-50 peer-checked:border-teal-500 peer-checked:bg-teal-50">
                                <span
                                    class="absolute right-4 top-4 rounded-full bg-teal-100 px-3 py-1 text-xs font-semibold text-teal-700">
                                    From ৳ 400
                                </span>
                                <p class="font-semibold">Complete Blood Count (CBC)</p>
                            </div>
                        </label>

                        <label class="block cursor-pointer">
                            <input type="checkbox" class="peer hidden">
                            <div
                                class="relative rounded-xl border p-4 transition hover:bg-teal-50 peer-checked:border-teal-500 peer-checked:bg-teal-50">
                                <span
                                    class="absolute right-4 top-4 rounded-full bg-teal-100 px-3 py-1 text-xs font-semibold text-teal-700">
                                    From ৳ 1200
                                </span>
                                <p class="font-semibold">Lipid Profile</p>
                            </div>
                        </label>

                    </div>

                    <!-- Pagination (EXACT STYLE LIKE IMAGE) -->
                    <div class="mt-10 flex flex-col gap-4 border-t pt-4 md:flex-row md:items-center md:justify-between">

                        <!-- Left: Page Controls -->
                        <div class="flex items-center gap-1 text-sm">

                            <button class="px-3 py-2 font-medium text-gray-700 hover:text-teal-600">
                                PREV
                            </button>

                            <button class="rounded-md bg-teal-100 px-3 py-2 font-medium text-teal-700">
                                1
                            </button>

                            <button class="rounded-md px-3 py-2 hover:bg-gray-100">
                                2
                            </button>

                            <button class="rounded-md px-3 py-2 hover:bg-gray-100">
                                3
                            </button>

                            <button class="rounded-md px-3 py-2 hover:bg-gray-100">
                                4
                            </button>

                            <button class="rounded-md px-3 py-2 hover:bg-gray-100">
                                5
                            </button>

                            <span class="px-2 text-gray-400">…</span>

                            <button class="rounded-md px-3 py-2 hover:bg-gray-100">
                                162
                            </button>

                            <button class="px-3 py-2 font-medium text-gray-700 hover:text-teal-600">
                                NEXT
                            </button>
                        </div>

                        <!-- Right: Info -->
                        <p class="text-sm text-gray-600">
                            Showing <span class="font-medium">1</span> to
                            <span class="font-medium">6</span> of
                            <span class="font-medium">968</span>
                            (162 Pages)
                        </p>

                    </div>
                </div>

                <!-- RIGHT: LAB + SUMMARY -->
                <div class="h-fit space-y-6 rounded-xl border border-gray-200 bg-white p-6">

                    <h3 class="text-lg font-semibold">Choose Test Center</h3>

                    <div class="space-y-3">
                        <label class="block cursor-pointer">
                            <input type="radio" name="lab" class="peer hidden">
                            <div
                                class="rounded-xl border p-4 transition peer-checked:border-teal-500 peer-checked:bg-teal-50">
                                <p class="font-medium">AmarLab</p>
                            </div>
                        </label>

                        <label class="block cursor-pointer">
                            <input type="radio" name="lab" class="peer hidden">
                            <div
                                class="rounded-xl border p-4 transition peer-checked:border-teal-500 peer-checked:bg-teal-50">
                                <p class="font-medium">Popular Diagnostic Center</p>
                            </div>
                        </label>
                    </div>

                    <!-- Summary -->
                    <!-- <div class="space-y-2 border-t pt-4 text-sm">
                        <div class="flex justify-between">
                            <span>CBC</span>
                            <span>৳ 400</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Lipid Profile</span>
                            <span>৳ 1200</span>
                        </div>
                        <div class="flex justify-between border-t pt-2 font-semibold">
                            <span>Estimated Total Price</span>
                            <span class="text-teal-600">৳ 1600</span>
                        </div>
                    </div> -->

                    <!-- Continue -->
                    <button @click="step = 2; window.scrollTo({ top: 0, behavior: 'smooth' })"
                        class="w-full rounded-xl bg-teal-500 py-3 text-white transition-colors hover:bg-teal-600">
                        Continue
                    </button>

                </div>
            </div>

            <!-- ================= STEP 2 : USER INFO ================= -->
            <div x-show="step === 2" y-transition class="mx-auto max-w-3xl" style="display: none">

                <!-- USER INFORMATION FORM -->
                <div class="space-y-6 rounded-xl border border-gray-200 bg-white p-6">

                    <!-- Header -->
                    <div>
                        <h3 class="text-lg font-semibold">Personal Information</h3>
                        <p class="text-sm text-gray-500">
                            Please fill up the below form with your personal detail
                        </p>
                    </div>

                    <!-- Form -->
                    <form class="space-y-5">

                        <!-- Full Name -->
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">
                                Full Name
                            </label>
                            <input type="text" placeholder="Enter full name"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">
                                Phone Number
                            </label>
                            <input type="text" placeholder="01XXXXXXXXX"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">
                                Email
                            </label>
                            <input type="email" placeholder="example@email.com"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                        </div>

                        <!-- Age & Gender -->
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">
                                    Age
                                </label>
                                <input type="number" placeholder="Age"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">
                                    Gender
                                </label>
                                <select
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                    <option>Select gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>

                        </div>

                        <!-- Address -->
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">
                                Address
                            </label>
                            <textarea rows="3" placeholder="Enter address"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none"></textarea>
                        </div>

                        <!-- Note -->
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">
                                Special Instructions (Optional)
                            </label>
                            <textarea rows="2" placeholder="Any additional notes"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none"></textarea>
                        </div>

                        <!-- Actions -->
                        <div class="flex flex-col gap-3 pt-2 sm:flex-row">

                            <button type="button" type="button"
                                @click="step = 1; window.scrollTo({ top: 0, behavior: 'smooth' })"
                                class="w-full rounded-xl border border-gray-300 py-3 text-gray-700 transition hover:bg-gray-50 sm:w-1/2">
                                Back
                            </button>

                            <button type="submit"
                                class="w-full rounded-xl bg-teal-500 py-3 text-white transition hover:bg-teal-600 sm:w-1/2">
                                Confirm
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div> --}}

        <div x-data="{ step: 1 }" class="mx-auto max-w-7xl py-8">

            <!-- ================= STEP 1 ================= -->
            <div x-show="step === 1" y-transition class="grid grid-cols-1 gap-6 lg:grid-cols-3" style="display: none">

                <!-- LEFT: TEST LIST -->
                <div class="rounded-xl border bg-white p-6 lg:col-span-2">

                    <h2 class="mb-1 text-xl font-semibold">All Diagnostics Tests</h2>

                    <p class="mb-4 text-sm text-gray-500">
                        {{ $tests->total() }}
                        {{ $tests->total() === 1 ? "Test" : "Tests" }}
                        Available
                    </p>

                    <div class="relative mb-6">
                        <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35m1.85-5.65a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                        </svg>

                        <input type="search" placeholder="Search test..." wire:model.live.debounce.300ms="search"
                            class="w-full rounded-xl border py-4 pl-12 pr-4 text-sm focus:border-teal-500 focus:outline-none" />
                    </div>


                    <div class="space-y-3">
                        @foreach ($tests as $test)
                            <label class="block cursor-pointer">
                                <input type="checkbox" wire:model.live="selectedTests" value="{{ $test->id }}"
                                    class="peer hidden">

                                <div
                                    class="relative rounded-xl border p-4 transition hover:bg-teal-50 peer-checked:border-teal-500 peer-checked:bg-teal-50">

                                    <span
                                        class="absolute right-4 top-4 rounded-full bg-teal-100 px-3 py-1 text-xs font-semibold text-teal-700">
                                        From ৳ {{ number_format((float) $test->price) }}
                                    </span>

                                    <p class="font-semibold">{{ $test->name }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>

                    <div class="mt-10 flex flex-col gap-4 border-t pt-4 md:flex-row md:items-center md:justify-between">

                        <!-- Left -->
                        <div class="flex items-center gap-1 text-sm">

                            <!-- PREV -->
                            <button wire:click="previousPage"
                                class="px-3 py-2 font-medium text-gray-700 hover:text-teal-600"
                                @disabled($tests->onFirstPage())>
                                PREV
                            </button>

                            <!-- First Page -->
                            <button wire:click="gotoPage(1)"
                                class="{{ $pagination["current"] == 1 ? "bg-teal-100 font-medium text-teal-700" : "hover:bg-gray-100" }} rounded-md px-3 py-2">
                                1
                            </button>

                            <!-- Left Ellipsis -->
                            @if ($pagination["start"] > 2)
                                <span class="px-2 text-gray-400">…</span>
                            @endif

                            <!-- Middle Pages -->
                            @for ($i = $pagination["start"]; $i <= $pagination["end"]; $i++)
                                @if ($i != 1 && $i != $pagination["last"])
                                    <button wire:click="gotoPage({{ $i }})"
                                        class="{{ $pagination["current"] == $i ? "bg-teal-100 font-medium text-teal-700" : "hover:bg-gray-100" }} rounded-md px-3 py-2">
                                        {{ $i }}
                                    </button>
                                @endif
                            @endfor

                            <!-- Right Ellipsis -->
                            @if ($pagination["end"] < $pagination["last"] - 1)
                                <span class="px-2 text-gray-400">…</span>
                            @endif

                            <!-- Last Page -->
                            @if ($pagination["last"] > 1)
                                <button wire:click="gotoPage({{ $pagination["last"] }})"
                                    class="{{ $pagination["current"] == $pagination["last"]
                                        ? "bg-teal-100 font-medium text-teal-700"
                                        : "hover:bg-gray-100" }} rounded-md px-3 py-2">
                                    {{ $pagination["last"] }}
                                </button>
                            @endif


                            <!-- NEXT -->
                            <button @if ($tests->hasMorePages()) wire:click="nextPage" @endif
                                {{ !$tests->hasMorePages() ? "disabled" : "" }}
                                class="{{ !$tests->hasMorePages() ? "cursor-not-allowed text-gray-300" : "text-gray-700 hover:text-teal-600" }} px-3 py-2 font-medium">
                                NEXT
                            </button>

                        </div>

                        <!-- Right Info -->
                        <p class="text-sm text-gray-600">
                            Showing
                            <span class="font-medium">{{ $tests->firstItem() }}</span>
                            to
                            <span class="font-medium">{{ $tests->lastItem() }}</span>
                            of
                            <span class="font-medium">{{ $tests->total() }}</span>
                            ({{ $tests->lastPage() }} Pages)
                        </p>
                    </div>

                </div>

                <!-- RIGHT: LAB + SUMMARY -->
                <div class="h-fit space-y-6 rounded-xl border bg-white p-6">

                    <h3 class="text-lg font-semibold tracking-tight">Choose Test Center</h3>

                    <div class="space-y-3">
                        @foreach ($labs as $lab)
                            <label class="block cursor-pointer">
                                <input type="radio" wire:model="selectedLab" value="{{ $lab->id }}"
                                    class="peer hidden">
                                <div
                                    class="rounded-xl border p-4 transition peer-checked:border-teal-500 peer-checked:bg-teal-50">
                                    <p class="font-semibold">{{ $lab->name }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>

                    <!-- Continue -->
                    {{-- <button @click="step = 2; window.scrollTo({ top: 0, behavior: 'smooth' })"
                        class="w-full rounded-xl bg-teal-500 py-3 text-white hover:bg-teal-600">
                        Continue
                    </button> --}}
                    <button @click="step = 2; window.scrollTo({ top: 0, behavior: 'smooth' })"
                        class="{{ count($selectedTests) > 0 ? "bg-teal-500 hover:bg-teal-600" : "bg-gray-300 cursor-not-allowed" }} w-full rounded-xl py-3 font-semibold text-white transition-colors"
                        {{ count($selectedTests) === 0 ? "disabled" : "" }}>
                        Continue
                    </button>
                    @if (count($selectedTests) === 0)
                        <span
                            class="mt-2 inline-flex items-center gap-1.5 rounded-md bg-amber-50 px-3 py-1 text-xs font-medium text-amber-700">
                            <svg class="h-4 w-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01M12 3a9 9 0 100 18 9 9 0 000-18z" />
                            </svg>

                            <span>Select at least one test to continue</span>
                        </span>
                    @endif
                </div>
            </div>

            <!-- ================= STEP 2 ================= -->
            <div x-show="step === 2" y-transition class="mx-auto max-w-3xl" style="display: none">

                <!-- USER INFORMATION FORM -->
                <div class="space-y-6 rounded-xl border border-gray-200 bg-white p-6">

                    <!-- Header -->
                    <div>
                        <h3 class="text-lg font-semibold">Patient Information</h3>
                        <p class="text-sm text-gray-500">
                            Please fill up the below form with your detail
                        </p>
                    </div>

                    <!-- Form -->
                    <form class="space-y-5">

                        <!-- Full Name -->
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">
                                Full Name
                            </label>
                            <input type="text" placeholder="Enter full name"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">
                                Phone Number
                            </label>
                            <input type="text" placeholder="01XXXXXXXXX"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">
                                Email
                            </label>
                            <input type="email" placeholder="example@email.com"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                        </div>

                        <!-- Age & Gender -->
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">
                                    Age
                                </label>
                                <input type="number" placeholder="Age"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">
                                    Gender
                                </label>
                                <select
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                                    <option>Select gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>

                        </div>

                        <!-- Address -->
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">
                                Address
                            </label>
                            <textarea rows="3" placeholder="Enter address"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none"></textarea>
                        </div>

                        <!-- Note -->
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">
                                Special Instructions (Optional)
                            </label>
                            <textarea rows="2" placeholder="Any additional notes"
                                class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none"></textarea>
                        </div>

                        <!-- Actions -->
                        <div class="flex flex-col gap-3 pt-2 sm:flex-row">

                            <button type="button" type="button"
                                @click="step = 1; window.scrollTo({ top: 0, behavior: 'smooth' })"
                                class="w-full rounded-xl border border-gray-300 py-3 text-gray-700 transition hover:bg-gray-50 sm:w-1/2">
                                Back
                            </button>

                            <button type="submit"
                                class="w-full rounded-xl bg-teal-500 py-3 text-white transition hover:bg-teal-600 sm:w-1/2">
                                Confirm
                            </button>

                        </div>

                    </form>

                </div>
            </div>
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
    </section>

    @push("title")
        CareOn - {{ $service->name }}
    @endpush
</div>
