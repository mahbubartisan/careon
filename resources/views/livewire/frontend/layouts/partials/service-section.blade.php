<!-- Section Heading -->
<section class="mx-auto bg-white px-6 py-14 text-center">
    <h2 class="text-2xl font-bold text-gray-900 md:text-3xl">
        Care, always on
    </h2>
    <p class="mx-auto mt-3 max-w-2xl text-gray-600">
        Professional care tailored to your needs. All providers are verified,
        trained, and background-checked.
    </p>
</section>

<!-- Service Cards -->
@foreach ($serviceTypes as $serviceType)
    <section class="mx-auto px-4 pb-16">
        <h3 class="mb-6 text-xl font-semibold text-gray-900 lg:text-2xl">
            {{ $serviceType->name }}
        </h3>

        <!-- Medical Care Services -->
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">
            @foreach ($serviceType->services as $service)
                <button type="button" wire:click.prevent="redirectToServiceForm('{{ $service->slug }}')"
                    class="group rounded-2xl border border-gray-200 bg-gray-50/20 p-6 transition duration-300 ease-in-out hover:bg-white hover:shadow-[0_0_25px_rgba(0,0,0,0.1)]">

                    <div class="flex items-start gap-4">

                        <!-- Icon -->
                        <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-2xl bg-[#E6F9F3]">
                            <img src="{{ asset(optional($service->media)->path) }}" alt="{{ $service->name }}"
                                class="h-10 w-10 object-contain" />
                        </div>

                        <!-- Content -->
                        <div class="flex flex-1 flex-col gap-1 text-left">

                            <!-- Title + Badge (same line) -->
                            <div class="flex items-center gap-3">
                                <h4 class="font-semibold leading-snug text-gray-900 group-hover:text-teal-500">
                                    {{ $service->name }}
                                </h4>

                                <span class="ml-auto">
                                    @if ($service->badge == 1)
                                        <span
                                            class="rounded-full bg-teal-500 px-2 py-1 text-xs font-semibold text-white">
                                            Most Popular
                                        </span>
                                    @elseif ($service->badge == 2)
                                        <span
                                            class="rounded-full bg-teal-500 px-2 py-1 text-xs font-semibold text-white">
                                            24/7
                                        </span>
                                    @endif
                                </span>
                            </div>

                            <!-- Description -->
                            <p class="line-clamp-3 text-sm text-gray-600">
                                {{ Str::limit(strip_tags($service->short_desc), 60) }}
                            </p>

                        </div>
                    </div>
                </button>
            @endforeach
        </div>




    </section>
@endforeach
