<div>
    {{-- <section class="mx-auto max-w-7xl px-4 pb-16 pt-28">

        <!-- Title -->
        <h1 class="text-4xl font-bold leading-tight text-gray-900">
            10 Easy Ways to Stay Active at Home
        </h1>

        <!-- Meta -->
        <div class="mt-3 flex items-center gap-4 text-sm text-gray-600">
            <div>
                <p>Published on January 5, 2025</p>
            </div>
        </div>

        <!-- Featured Image -->
        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=900&q=80"
            class="mt-6 w-full rounded-2xl object-cover shadow-sm">

        <!-- Content -->
        <article class="prose prose-teal mt-10 max-w-none">
            <p>
                Staying active at home doesn’t require a gym or equipment—just simple daily habits
                that keep your body moving and your mind energized.
            </p>

            <h2>1. Start With Morning Stretching</h2>
            <p>
                Gentle stretching activates your muscles and improves your flexibility.
            </p>

            <h2>2. Take Short Movement Breaks</h2>
            <p>
                Every hour, walk around, stretch, or do a quick 2-minute exercise.
            </p>

            <h2>3. Try Home Workout Videos</h2>
            <p>
                YouTube and fitness apps offer thousands of beginner-friendly routines.
            </p>

            <blockquote>
                “Small, consistent steps lead to a healthier lifestyle.”
            </blockquote>

            <p>
                Staying active is all about consistency, not intensity. Build habits one step at
                a time.
            </p>
        </article>

        <!-- Divider -->
        <div class="my-12 h-px bg-gray-200"></div>

        <!-- Related Posts -->
        <h2 class="mb-5 text-xl font-bold text-gray-900">Related Articles</h2>

        <div class="grid gap-6 grid-cols-2 lg:grid-cols-4">
            <a href="#" class="group block rounded-2xl border bg-white transition-all hover:shadow-lg">
                <img src="https://images.unsplash.com/photo-1558611848-73f7eb4001a1?q=80&w=900"
                    class="h-40 w-full rounded-t-2xl object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-teal-600">
                        7 Healthy Habits for a Stronger Immune System
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Simple steps to strengthen your natural defenses.
                    </p>
                </div>
            </a>

            <a href="#" class="group block rounded-2xl border bg-white transition-all hover:shadow-lg">
                <img src="https://images.unsplash.com/photo-1605296867304-46d5465a13f1?q=80&w=900"
                    class="h-40 w-full rounded-t-2xl object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-teal-600">
                        How to Build a Daily Wellness Routine
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        A gentle routine for body and mind.
                    </p>
                </div>
            </a>
        </div>

    </section> --}}
    <section class="mx-auto max-w-7xl px-4 pb-16 pt-28">

        <!-- Title -->
        <h1 class="text-4xl font-bold leading-tight text-gray-900">
            {{ $blog->title }}
        </h1>

        <!-- Meta -->
        <div class="mt-3 flex items-center gap-4 text-sm text-gray-600">
            <div>
                <p>Published on {{ $blog->created_at->format("F d, Y") }}</p>
            </div>
        </div>

        <!-- Featured Image -->
        <img src="{{ asset(@$blog->media?->path ?? "default.jpg") }}"
            class="mt-6 w-full rounded-2xl object-cover shadow-sm" alt="{{ $blog->title }}">

        <!-- Content -->
        <div class="prose prose-teal mt-10 max-w-none">
            {!! $blog->description !!}
        </div>

        <!-- Divider -->
        <div class="my-12 h-px bg-gray-200"></div>

        <!-- Related Posts -->
        <h2 class="mb-5 text-xl font-bold text-gray-900">Related Articles</h2>

        <div class="grid grid-cols-2 gap-6 lg:grid-cols-4">

            @forelse ($relatedPosts as $item)
                <a href="{{ route("frontend.blog-detail", $item->slug) }}"
                    class="group block rounded-2xl border bg-white transition-all hover:shadow-lg">

                    <img src="{{ asset($item->media->path ?? "default.jpg") }}"
                        class="h-40 w-full rounded-t-2xl object-cover" alt="{{ $item->title }}">

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-teal-600">
                            {{ $item->title }}
                        </h3>
                        <p class="mt-2 text-sm text-gray-500">
                            {{ Str::limit($item->short_description, 80) }}
                        </p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">No related articles.</p>
            @endforelse

        </div>
    </section>

    @push("title")
        {{ $blog->title }}
    @endpush
</div>
