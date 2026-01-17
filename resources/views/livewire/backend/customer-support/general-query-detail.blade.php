<div>

    <!-- Header -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">General Query Details</h1>
            <p class="text-sm text-gray-500">Submitted on
                {{ $form->query->created_at->format("d M Y, h:i A") }}</p>
        </div>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">General Query Detail</li>
            </ol>
        </nav>
    </div>


    <!-- Main Card -->
    <div class="rounded-xl border border-gray-200 bg-white p-6">
        <!-- User Info -->
        <div class="rounded-xl border-b border-gray-100 bg-gray-50 px-6 py-5">
            <div class="flex items-center gap-4">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-600 text-lg font-medium text-white">
                    {{ strtoupper(substr($form->query->name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-lg font-medium tracking-tight text-gray-900">{{ $form->query->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $form->query->email }}</p>
                </div>
            </div>
        </div>


        <!-- Query Content -->
        <div class="space-y-6 px-6 py-6">
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Phone</h3>
                <p class="mt-1 text-base text-gray-800">{{ $form->query->phone ?? "—" }}</p>
            </div>
            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Subject</h3>
                <p class="mt-1 text-base text-gray-800">{{ $form->query->subject ?? "—" }}</p>
            </div>


            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-500">Message</h3>
                <div class="mt-2 rounded-xl border border-gray-200 bg-gray-50 p-4 leading-relaxed text-gray-700">
                    {{ $form->query->message }}
                </div>
            </div>
        </div>
    </div>

    <div class="my-5">
        <a href="{{ route("general-query") }}"
            class="inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-blue-600 px-4 py-2.5 text-sm text-white">
            ← Back to list
        </a>
    </div>
</div>
