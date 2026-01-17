<div>

    <!-- Header -->
    {{-- <div class="mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-800">Feedback Details</h1>
                    <p class="text-sm text-gray-500">Submitted on
                        {{ $form->feedback->created_at->format("d M Y, h:i A") }}</p>
                </div>
                <a href="{{ route("feedback") }}"
                    class="inline-flex items-center gap-2 rounded-lg border border-gray-200 px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">
                    ← Back to list
                </a>
            </div>
        </div> --}}
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Feedback Details</h1>
            <p class="text-sm text-gray-500">Submitted on
                {{ $form->feedback->created_at->format("d M Y, h:i A") }}</p>
        </div>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Feedback Detail</li>
            </ol>
        </nav>
    </div>


    <!-- Main Card -->
    <div class="rounded-xl border border-gray-200 bg-white p-6">
        <!-- User Info -->
        <div class="border-b rounded-xl border-gray-100 bg-gray-50 px-6 py-5">
            <div class="flex items-center gap-4">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-600 font-medium text-white text-lg">
                    {{ strtoupper(substr($form->feedback->name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-lg font-medium text-gray-900 tracking-tight">{{ $form->feedback->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $form->feedback->email }}</p>
                </div>
            </div>
        </div>


        <!-- Feedback Content -->
        <div class="space-y-6 px-6 py-6">
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Phone</h3>
                <p class="mt-1 text-base text-gray-800">{{ $form->feedback->phone ?? "—" }}</p>
            </div>
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Service</h3>
                <p class="mt-1 text-base text-gray-800">{{ $form->feedback->service ?? "—" }}</p>
            </div>
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Rating</h3>
                <p class="mt-1 text-base text-gray-800">{{ $form->feedback->rating ?? "—" }}</p>
            </div>
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Subject</h3>
                <p class="mt-1 text-base text-gray-800">{{ $form->feedback->subject ?? "—" }}</p>
            </div>


            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Message</h3>
                <div class="mt-2 rounded-xl border border-gray-200 bg-gray-50 p-4 leading-relaxed text-gray-700">
                    {{ $form->feedback->message }}
                </div>
            </div>
        </div>
    </div>

    <div class="my-5">
        <a href="{{ route("feedback") }}"
            class="inline-flex items-center gap-2 rounded-lg border border-gray-200 px-4 py-2.5 text-sm text-white bg-blue-600">
            ← Back to list
        </a>
    </div>
</div>
