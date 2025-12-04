<div>
    <div class="mx-auto max-w-7xl px-4 pb-16 pt-28">
        <section>
            <div>
                <!-- Hero -->
                <div class="mx-auto mb-11 max-w-2xl text-center">
                    <h1 class="text-3xl font-bold text-gray-900 lg:text-4xl">
                        Healthy Choices, Happier Life
                    </h1>
                    <p class="mt-3 text-lg text-gray-600">
                        Expert tips, wellness guides, and daily health advice for a better life.
                    </p>

                    <!-- Search -->
                    {{-- <div class="relative mx-auto mt-6 max-w-md">
                        <input type="text" placeholder="Search health topics..."
                            class="w-full rounded-xl border bg-white py-3 pl-4 pr-12 focus:border-teal-400 focus:outline-none">

                        <!-- Search SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="absolute right-4 top-3.5 h-5 w-5 text-teal-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
                        </svg>
                    </div> --}}
                </div>

                <!-- Article Grid -->
                {{-- <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

                    <!-- Article 1 -->
                    <a href="{{ route('frontend.blog-detail') }}"
                        class="group block rounded-2xl border bg-white transition-all hover:shadow-lg">
                        <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=900&q=80"
                            class="h-56 w-full rounded-t-2xl object-cover">
                        <div class="p-5">
                            <h3
                                class="text-lg font-semibold text-gray-800 transition group-hover:text-teal-600 group-hover:underline">
                                7 Nutrition Tips to Boost Daily Energy
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Easy nutritional habits to help you stay energized throughout the day.
                            </p>
                        </div>
                    </a>

                    <!-- Article 2 -->
                    <a href="{{ route('frontend.blog-detail') }}"
                        class="group block rounded-2xl border bg-white transition-all hover:shadow-lg">
                        <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=900&q=80"
                            class="h-56 w-full rounded-t-2xl object-cover">
                        <div class="p-5">
                            <h3
                                class="text-lg font-semibold text-gray-800 transition group-hover:text-teal-600 group-hover:underline">
                                How to Improve Sleep Quality Naturally
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Simple nighttime practices to help your mind and body rest better.
                            </p>
                        </div>
                    </a>

                    <!-- Article 3 -->
                    <a href="{{ route('frontend.blog-detail') }}"
                        class="group block rounded-2xl border bg-white transition-all hover:shadow-lg">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=900&q=80"
                            class="h-56 w-full rounded-t-2xl object-cover">
                        <div class="p-5">
                            <h3
                                class="text-lg font-semibold text-gray-800 transition group-hover:text-teal-600 group-hover:underline">
                                Beginner’s Guide to Mindful Breathing
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">
                                Discover how mindful breathing can reduce stress and improve focus.
                            </p>
                        </div>
                    </a>

                    <!-- Article 4 -->
                    <a href="{{ route('frontend.blog-detail') }}" class="group block rounded-2xl border bg-white transition-all hover:shadow-lg">
                        <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=900&q=80"
                            class="h-56 w-full rounded-t-2xl object-cover" alt="Stay Active at Home">

                        <div class="p-5">
                            <h3
                                class="text-lg font-semibold text-gray-800 transition group-hover:text-teal-600 group-hover:underline">
                                10 Easy Ways to Stay Active at Home
                            </h3>

                            <p class="mt-2 text-sm text-gray-500">
                                Stay fit with simple home activities—no equipment required.
                            </p>
                        </div>
                    </a>
                </div> --}}
                <!-- Article Grid -->
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

                    @forelse ($blogs as $blog)
                        <a href="{{ route("frontend.blog-detail", $blog->slug) }}"
                            class="group block rounded-2xl border bg-white transition-all hover:shadow-lg">

                            <img src="{{ asset($blog->media?->path) }}" class="h-56 w-full rounded-t-2xl object-cover"
                                alt="{{ $blog->title }}">

                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-gray-800 transition group-hover:text-teal-600 group-hover:underline"
                                    title="{{ $blog->title }}">
                                    {{ $blog->title }}
                                </h3>

                                <div class="mt-2 line-clamp-2 text-sm text-gray-500">
                                    {!! str()->limit($blog->description, 100) !!}
                                </div>
                            </div>
                        </a>
                    @empty

                        <div class="col-span-4 py-10 text-center font-medium italic text-red-500">
                            No blogs found...
                        </div>
                    @endforelse
                </div>


                <!-- Pagination -->
                {{-- <div class="mt-14 flex items-center justify-center gap-2">

                    <!-- Previous -->
                    <a href="#"
                        class="rounded-lg border bg-white px-4 py-2 text-teal-500 transition hover:bg-teal-50 hover:text-teal-600">
                        Previous
                    </a>

                    <!-- Page Numbers -->
                    <div class="flex items-center gap-1">

                        <a href="#" class="rounded-lg border bg-teal-500 px-3 py-2 text-white transition">
                            1
                        </a>

                        <a href="#"
                            class="rounded-lg border bg-white px-3 py-2 text-teal-500 transition hover:bg-teal-50 hover:text-teal-600">
                            2
                        </a>

                        <span class="px-3 py-2 text-gray-500">...</span>

                        <a href="#"
                            class="rounded-lg border bg-white px-3 py-2 text-teal-500 transition hover:bg-teal-50 hover:text-teal-600">
                            7
                        </a>

                        <a href="#"
                            class="rounded-lg border bg-white px-3 py-2 text-teal-500 transition hover:bg-teal-50 hover:text-teal-600">
                            8
                        </a>

                        <a href="#"
                            class="rounded-lg border bg-white px-3 py-2 text-teal-500 transition hover:bg-teal-50 hover:text-teal-600">
                            9
                        </a>
                    </div>

                    <!-- Next -->
                    <a href="#"
                        class="rounded-lg border bg-white px-4 py-2 text-teal-500 transition hover:bg-teal-50 hover:text-teal-600">
                        Next
                    </a>

                </div> --}}
                <div class="mt-14 flex items-center justify-center gap-2">
                    {{-- Previous --}}
                    @if ($blogs->onFirstPage())
                        <span class="rounded-lg border bg-white px-4 py-2 text-gray-400">Previous</span>
                    @else
                        <a href="{{ $blogs->previousPageUrl() }}"
                            class="rounded-lg border bg-white px-4 py-2 text-teal-500 transition hover:bg-teal-50 hover:text-teal-600">
                            Previous
                        </a>
                    @endif

                    {{-- Page Numbers with ellipses --}}
                    @php
                        $current = $blogs->currentPage();
                        $last = $blogs->lastPage();
                        $window = 2; // pages to show on each side of current
                        $start = max(1, $current - $window);
                        $end = min($last, $current + $window);

                        $pages = [];

                        // Always show first page
                        if ($start > 1) {
                            $pages[] = 1;
                            if ($start > 2) {
                                $pages[] = "...";
                            }
                        }

                        // Add window pages
                        for ($i = $start; $i <= $end; $i++) {
                            $pages[] = $i;
                        }

                        // Always show last page
                        if ($end < $last) {
                            if ($end < $last - 1) {
                                $pages[] = "...";
                            }
                            $pages[] = $last;
                        }
                    @endphp

                    <div class="flex items-center gap-1">
                        @foreach ($pages as $page)
                            @if ($page === "...")
                                <span class="px-3 py-2 text-gray-500">…</span>
                            @elseif ($page == $current)
                                <span
                                    class="rounded-lg border bg-teal-500 px-3 py-2 text-white">{{ $page }}</span>
                            @else
                                <a href="{{ $blogs->url($page) }}"
                                    class="rounded-lg border bg-white px-3 py-2 text-teal-500 transition hover:bg-teal-50 hover:text-teal-600">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>

                    {{-- Next --}}
                    @if ($blogs->hasMorePages())
                        <a href="{{ $blogs->nextPageUrl() }}"
                            class="rounded-lg border bg-white px-4 py-2 text-teal-500 transition hover:bg-teal-50 hover:text-teal-600">
                            Next
                        </a>
                    @else
                        <span class="rounded-lg border bg-white px-4 py-2 text-gray-400">Next</span>
                    @endif
                </div>


            </div>
        </section>
    </div>

    @push("title")
        CareOn - Health Tips
    @endpush
</div>
