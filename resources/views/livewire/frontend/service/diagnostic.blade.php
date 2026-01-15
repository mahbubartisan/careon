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
                {{ optional(@$service->type)->name }}
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

        <div x-data="{ step: 1 }" class="mx-auto max-w-7xl py-8">

            <!-- ================= STEP 1 ================= -->
            {{-- <div x-show="step === 1" y-transition style="display: none">

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">


                    <!-- TEST SELECTION -->
                    <div class="rounded-xl border bg-white p-5 lg:col-span-2">
                        <h2 class="mb-1 text-lg font-semibold text-gray-900">
                            Select Tests
                        </h2>

                        <p class="mb-1 text-sm text-gray-500">
                            {{ $tests->total() }}
                            {{ $tests->total() === 1 ? "Test" : "Tests" }}
                            Available
                        </p>

                        <span
                            class="mb-3 inline-flex items-center gap-1.5 rounded-md bg-amber-50 px-3 py-1 text-xs font-medium text-amber-700">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01M12 3a9 9 0 100 18 9 9 0 000-18z" />
                            </svg>
                            <span>Please first select the lab to see the test prices.</span>
                        </span>

                        <div class="relative mb-6">
                            <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35m1.85-5.65a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                            </svg>

                            <input type="search" placeholder="Search test..." wire:model.live.debounce.300ms="search"
                                class="w-full rounded-xl border py-4 pl-12 pr-4 text-sm focus:border-teal-500 focus:outline-none" />
                        </div>

                        <div class="space-y-3 pr-2">
                            @foreach ($tests as $test)
                                <div wire:click="toggleTest({{ $test["id"] }})"
                                    class="{{ in_array($test["id"], $selectedTestIds) ? "border-teal-500 bg-teal-50" : "border-gray-200 hover:bg-gray-50" }} cursor-pointer rounded-xl border p-4 transition">

                                    <div class="flex items-start justify-between">
                                        <div>
                                            <p class="font-semibold text-gray-900">
                                                {{ $test["name"] }}
                                            </p>
                                        </div>

                                        @if ($selectedLab && isset($test["prices"][$selectedLab]))
                                            <span
                                                class="rounded-full bg-teal-100 px-3 py-1 text-sm font-semibold text-teal-700">
                                                ৳ {{ $test["prices"][$selectedLab] }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- Pagination (DYNAMIC) -->
                        <div
                            class="mt-10 flex flex-col gap-4 border-t pt-4 md:flex-row md:items-center md:justify-between">

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


                </div>
                <button @click="step = 2; window.scrollTo({ top: 0, behavior: 'smooth' })"
                    wire:click="prepareComparison" class="w-full rounded-xl bg-teal-500 py-3 font-semibold text-white">
                    Continue
                </button>
            </div> --}}
            <div x-show="step === 1" y-transition style="display: none" class="space-y-6">

                <!-- HEADER -->
                <div class="rounded-2xl border bg-gradient-to-r from-teal-50 to-white p-6">
                    <h2 class="text-xl font-semibold text-gray-900">
                        Choose Diagnostic Tests
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ $tests->total() }} {{ $tests->total() === 1 ? "Test" : "Tests" }} available
                    </p>
                </div>

                <!-- SEARCH -->
                <div class="relative">
                    <input type="search" placeholder="Search tests..." wire:model.live.debounce.300ms="search"
                        class="w-full rounded-2xl border border-gray-200 bg-white py-4 pl-12 pr-4 text-sm focus:border-teal-500 focus:outline-none" />

                    <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m1.85-5.65a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                    </svg>
                </div>

                <!-- TEST LIST -->
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                    @foreach ($tests as $test)
                        <div wire:click="toggleTest({{ $test["id"] }})"
                            class="{{ in_array($test["id"], $selectedTestIds)
                                ? "border-teal-500 bg-teal-50"
                                : "border-gray-200 hover:border-teal-300 hover:bg-gray-50" }} group relative cursor-pointer rounded-2xl border p-5 transition">

                            <!-- SELECTED INDICATOR -->
                            @if (in_array($test["id"], $selectedTestIds))
                                <span
                                    class="absolute right-4 top-4 rounded-full bg-teal-500 px-2 py-1 text-xs font-semibold text-white">
                                    Selected
                                </span>
                            @endif

                            <div class="flex flex-col gap-1">
                                <p class="text-base font-semibold text-gray-900">
                                    {{ $test["name"] }}
                                </p>
                                <p class="text-xs italic text-gray-400">
                                    Click to select this test
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- PAGINATION -->
                <div class="mt-10 flex flex-col items-center gap-4 border-t pt-6 lg:flex-row lg:items-center lg:justify-between">

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
                    </p>
                </div>
                
                <!-- CONTINUE -->
                <div class="flex justify-end pt-4">
                    <button @click="step = 2; window.scrollTo({ top: 0, behavior: 'smooth' })"
                        wire:click="prepareComparison"
                        class="w-full rounded-xl bg-teal-500 px-5 py-3 text-base font-semibold text-white transition hover:bg-teal-600 sm:w-auto">
                        Continue
                    </button>
                </div>

            </div>

            <!-- ================= STEP 2 ================= -->
            <div x-show="step === 2" y-transition style="display: none" class="mx-auto max-w-7xl space-y-8 py-8">

                <!-- HEADER -->
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900">Compare Labs & Prices</h2>
                    <p class="text-sm text-gray-500">
                        Compare selected test prices across labs and choose one lab to continue
                    </p>
                </div>

                <!-- DESKTOP TABLE -->
                {{-- <div class="hidden overflow-x-auto rounded-2xl border bg-white p-6 lg:block">
                    <table class="w-full border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="border px-4 py-3 text-left">Test</th>
                                @foreach ($labs as $lab)
                                    <th class="border px-4 py-3 text-center">
                                        {{ $lab->name }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($comparison as $testName => $prices)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-4 py-3 font-medium">
                                        {{ $testName }}
                                    </td>

                                    @foreach ($labs as $lab)
                                        <td class="border px-4 py-3 text-center">
                                            @isset($prices[$lab->id])
                                                <span class="font-semibold text-gray-900">
                                                    ৳ {{ $prices[$lab->id] }}
                                                </span>
                                            @else
                                                <span class="text-gray-400">N/A</span>
                                            @endisset
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}

                <div class="hidden lg:block">
                    <div class="overflow-x-auto rounded-2xl border bg-white">

                        <table class="w-full border-collapse text-sm">

                            <!-- HEADER -->
                            <thead>
                                <tr class="border-b border-gray-300 bg-gray-50">
                                    <th
                                        class="sticky left-0 z-10 bg-gray-50 px-5 py-4 text-left font-semibold text-gray-700">
                                        Test Name
                                    </th>

                                    @foreach ($labs as $lab)
                                        <th class="px-5 py-4 text-center font-semibold text-gray-700">
                                            {{ $lab->name }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>

                            <!-- BODY -->
                            <tbody>
                                @foreach ($comparison as $testName => $prices)
                                    <tr class="border-b border-gray-200 last:border-b-0">

                                        <!-- TEST NAME -->
                                        <td class="sticky left-0 z-10 bg-white px-5 py-4 font-medium text-gray-900">
                                            {{ $testName }}
                                        </td>

                                        <!-- PRICES -->
                                        @foreach ($labs as $lab)
                                            <td class="px-5 py-4 text-center">
                                                @isset($prices[$lab->id])
                                                    <span class="font-semibold text-gray-900">
                                                        ৳ {{ $prices[$lab->id] }}
                                                    </span>
                                                @else
                                                    <span class="text-xs text-gray-400">Not Available</span>
                                                @endisset
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- MOBILE CARDS -->
                <div class="space-y-4 lg:hidden">
                    @foreach ($comparison as $testName => $prices)
                        <div class="rounded-2xl border bg-white p-5">
                            <p class="mb-3 font-semibold text-gray-900">{{ $testName }}</p>

                            <div class="space-y-2">
                                @foreach ($labs as $lab)
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600">{{ $lab->name }}</span>
                                        @isset($prices[$lab->id])
                                            <span class="font-semibold text-gray-900">
                                                ৳ {{ $prices[$lab->id] }}
                                            </span>
                                        @else
                                            <span class="text-gray-400">—</span>
                                        @endisset
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- LAB SELECTION -->
                <div>
                    <h3 class="mb-3 text-lg font-semibold text-gray-900">
                        Choose Your Preferred Lab
                    </h3>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($labs as $lab)
                            <button wire:click="selectLab({{ $lab->id }})"
                                class="{{ $selectedLab === $lab->id
                                    ? "border-teal-500 bg-teal-50"
                                    : "border-gray-200 hover:border-teal-300 hover:bg-gray-50" }} group relative w-full cursor-pointer rounded-2xl border p-5 transition">

                                <div class="flex items-start justify-between gap-4">

                                    <!-- LEFT CONTENT -->
                                    <div class="flex flex-col text-left">
                                        <p class="text-base font-semibold leading-tight text-gray-900">
                                            {{ $lab->name }}
                                        </p>
                                        <p class="mt-1 text-xs italic leading-snug text-gray-500">
                                            Click to select this lab
                                        </p>
                                    </div>

                                    <!-- BADGE -->
                                    @if ($selectedLab === $lab->id)
                                        <span
                                            class="mt-0.5 shrink-0 rounded-full bg-teal-500 px-3 py-1 text-xs font-semibold text-white">
                                            Selected
                                        </span>
                                    @endif
                                </div>
                            </button>
                        @endforeach

                    </div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="flex flex-col-reverse gap-4 sm:flex-row sm:justify-between">
                    <button @click="step = 1"
                        class="rounded-xl border px-5 py-3 font-medium text-gray-900 hover:bg-gray-50">
                        ← Back
                    </button>

                    <button @click="step = 3" wire:click="prepareSummary"
                        class="{{ $selectedLab ? "hover:bg-teal-600" : "cursor-not-allowed opacity-50" }} rounded-xl bg-teal-500 px-5 py-3 font-semibold text-white transition"
                        {{ $selectedLab ? "" : "disabled" }}>
                        Continue →
                    </button>
                </div>

            </div>


            <!-- ================= STEP 3 ================= -->
            <div x-show="step === 3" y-transition class="mx-auto max-w-7xl" style="display: none">

                <!-- USER INFORMATION FORM -->
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <div class="rounded-xl border border-gray-200 bg-white p-6 lg:col-span-2">
                        <!-- Header -->
                        <div>
                            <h3 class="text-lg font-semibold">Patient Information</h3>
                            <p class="mb-3 text-sm text-gray-500">
                                Please fill up the below form with your detail
                            </p>
                        </div>

                        <!-- Form -->
                        <form id="patientForm" class="space-y-4">
                            <!-- Patient Type -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-900">
                                    Booking For *
                                </label>

                                <div class="flex gap-6">
                                    <label class="flex cursor-pointer items-center gap-2 text-sm">
                                        <input type="radio" wire:model.live="form.bookingFor" value="self"
                                            class="text-teal-500 focus:ring-teal-500">
                                        Self
                                    </label>

                                    <label class="flex cursor-pointer items-center gap-2 text-sm">
                                        <input type="radio" wire:model.live="form.bookingFor" value="other"
                                            class="text-teal-500 focus:ring-teal-500">
                                        Someone Else
                                    </label>
                                </div>
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Full Name *
                                </label>
                                <input type="text" wire:model.defer="form.patient_name"
                                    @disabled($form->bookingFor === "self") placeholder="Enter full name"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                                @error("form.patient_name")
                                    <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phone & Email -->
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">

                                <!-- Phone -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">
                                        Phone Number *
                                    </label>
                                    <input type="number" wire:model="form.phone" @disabled($form->bookingFor === "self")
                                        placeholder="01XXXXXXXXX"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                                    @error("form.phone")
                                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">
                                        Email *
                                    </label>
                                    <input type="email" wire:model="form.email" @disabled($form->bookingFor === "self")
                                        placeholder="example@email.com"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                                    @error("form.email")
                                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <!-- Age & Gender -->
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">

                                <!-- Age -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">
                                        Age *
                                    </label>
                                    <input type="number" wire:model="form.patient_age"
                                        placeholder="Enter age (e.g. 32)"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                                    @error("form.patient_age")
                                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Gender -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">
                                        Gender *
                                    </label>
                                    <select wire:model="form.gender" @disabled($form->bookingFor === "self")
                                        class="w-full rounded-xl border border-gray-200 px-4 py-[13px] text-sm focus:border-teal-500 focus:outline-none">
                                        <option value="">-- Select one --</option>
                                        @foreach (\App\Enums\Gender::values() as $gender)
                                            <option value="{{ $gender }}">{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                    @error("form.gender")
                                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <!-- Date & Time -->
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">

                                <!-- Preferred Date -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">
                                        Preferred Collection Date *
                                    </label>
                                    <input type="date" wire:model="form.collection_date"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                                    @error("form.collection_date")
                                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Preferred Time Range -->
                                <div>
                                    <label class="mb-1 block text-sm font-medium text-gray-900">
                                        Preferred Time Range *
                                    </label>
                                    <select wire:model="form.collection_time_range"
                                        class="w-full rounded-xl border border-gray-200 px-4 py-[13px] text-sm focus:border-teal-500 focus:outline-none">
                                        <option value="">-- Select time range --</option>
                                        <option value="08:00 AM – 10:00 AM">08:00 AM – 10:00 AM</option>
                                        <option value="10:00 AM – 12:00 PM">10:00 AM – 12:00 PM</option>
                                        <option value="12:00 PM – 02:00 PM">12:00 PM – 02:00 PM</option>
                                        <option value="02:00 PM – 04:00 PM">02:00 PM – 04:00 PM</option>
                                        <option value="04:00 PM – 06:00 PM">04:00 PM – 06:00 PM</option>
                                        <option value="08:00 PM – 10:00 PM">08:00 PM – 10:00 PM</option>
                                    </select>
                                    @error("form.collection_time_range")
                                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <!-- Address -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Sample Collection Address *
                                </label>
                                <input wire:model="form.address" placeholder="Enter address"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none" />
                                @error("form.address")
                                    <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Note -->
                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-900">
                                    Special Instructions (Optional)
                                </label>
                                <textarea rows="2" wire:model="form.notes" placeholder="Any additional notes"
                                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none"></textarea>
                                @error("form.notes")
                                    <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>
                    </div>

                    <!-- Summery -->
                    <div>
                        <div class="h-fit rounded-2xl border border-gray-200 bg-white p-6">

                            <!-- Header -->
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    Booking Summary
                                </h3>
                                <p class="text-sm text-gray-500">
                                    Review your selected lab and tests
                                </p>
                            </div>

                            <!-- Selected Lab -->
                            <div class="mb-4">
                                <p class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                    Selected Lab
                                </p>
                                <p class="mt-1 font-semibold text-gray-900">
                                    {{ optional($labs->firstWhere("id", $selectedLab))->name ?? "—" }}
                                </p>
                            </div>

                            <!-- Divider -->
                            <div class="my-4 border-t border-dashed"></div>

                            <!-- Selected Tests -->
                            <div class="mb-4">
                                <p class="mb-2 text-xs font-medium uppercase tracking-wide text-gray-500">
                                    Selected Tests
                                </p>

                                @if (count($selectedTests))
                                    <ul class="space-y-2 text-sm">
                                        @foreach ($selectedTests as $testName => $price)
                                            <li class="flex justify-between">
                                                <span>{{ $testName }}</span>
                                                <span class="font-medium">৳ {{ $price }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-sm text-gray-400">
                                        No tests selected
                                    </p>
                                @endif
                            </div>

                            <!-- Total -->
                            <div class="mt-5 border-t pt-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-base font-semibold text-gray-900">
                                        Total Amount
                                    </span>
                                    <span class="text-xl font-bold text-teal-600">
                                        ৳ {{ collect($comparison)->sum(fn($prices) => $prices[$selectedLab] ?? 0) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex flex-col gap-4 pt-6 sm:flex-row">

                            <!-- Back -->
                            <button @click="step = 2"
                                class="rounded-xl border border-gray-300 py-3 text-sm font-medium text-gray-900 transition hover:bg-gray-50 sm:w-1/2">
                                ← Back
                            </button>

                            <!-- Confirm -->
                            @auth
                                <button form="patientForm" type="button" wire:click="book"
                                    class="rounded-xl bg-teal-500 px-8 py-3 text-sm font-medium text-white transition hover:bg-teal-600 sm:w-1/2">
                                    Confirm Booking
                                </button>
                            @else
                                <button type="button" wire:click="redirectToLogin"
                                    class="rounded-xl bg-teal-500 px-8 py-3 text-sm font-medium text-white transition hover:bg-teal-600 sm:w-1/2">
                                    Confirm Booking
                                </button>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push("title")
        CareOn - {{ @$service->name }}
    @endpush
</div>
