<!DOCTYPE html>
<html lang="en" x-data="{ tab: 'signin' }">
    @php
        $settings = App\Models\Settings::with("favIcon")->first();
    @endphp

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>
        <link rel="website icon" type="png" href="{{ asset(@$settings->favIcon?->path) }}">
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
            rel="stylesheet" />
        @vite("resources/css/app.css")
    </head>

    <body class="font-[Inter]">

        <!-- Navbar -->
        <div x-data="{ open: false }" x-cloak>
            <!-- Header -->
            <header class="fixed left-0 top-0 z-50 w-full bg-white shadow-sm">
                <div class="mx-auto flex items-center justify-between px-4 py-3">
                    <!-- Left: Logo -->
                    <div class="h-14 w-auto flex-shrink-0 sm:h-14">
                        <a href="{{ route("frontend.home-page") }}">
                            <img src="{{ asset(@$settings->siteLogo?->path) }}" alt="{{ $settings->site_name }}"
                                class="block h-full max-h-14 w-auto object-contain" />
                        </a>
                    </div>

                    <!-- Middle: Nav links (Desktop) -->

                    <nav class="hidden items-center space-x-8 font-normal text-gray-700 lg:flex">
                        <a href="{{ route("frontend.service") }}" class="hover:text-[#00B686]">Services</a>
                        <a href="{{ route("frontend.about") }}" class="hover:text-[#00B686]">About</a>
                        <a href="{{ route("frontend.contact-us") }}" class="hover:text-[#00B686]">Contact</a>
                        <a href="{{ route("frontend.blogs") }}" class="hover:text-[#00B686]">Health Tips</a>
                    </nav>

                    <!-- Right: Buttons (Desktop) -->
                    <div class="hidden items-center space-x-3 lg:flex">
                        <!-- Search -->
                        {{-- <div class="flex items-center rounded-md border border-gray-300 px-2 py-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <span class="ml-1 text-sm text-gray-600">Search</span>
                        </div> --}}

                        <!-- Register -->
                        {{-- <a href="provider-signup.html"
                            class="rounded-xl bg-blue-600 px-3 py-2 text-sm font-medium text-white transition duration-300 ease-in-out hover:bg-blue-600/90">
                            Register As Care Provider
                        </a> --}}

                        <!-- Sign In -->
                        <a href="{{ route("login") }}"
                            class="rounded-md bg-[#00B686] px-4 py-2 text-sm font-medium text-white hover:bg-[#00976F]">
                            Sign In
                        </a>
                        <!-- Book Now -->
                        <!-- <a href="book.html"
                            class="rounded-md bg-[#00B686] px-4 py-2 text-sm font-medium text-white hover:bg-[#00976F]">
                            Book Now
                        </a> -->
                    </div>

                    <!-- Mobile: Hamburger -->
                    <button @click="open = true" class="text-gray-700 focus:outline-none lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </header>

            <!-- Overlay -->
            <div x-show="open" @click="open = false" class="fixed inset-0 z-40 bg-black/10 lg:hidden"></div>

            <!-- Sidebar (Mobile Menu) -->
            <div class="fixed left-0 top-0 z-50 h-full w-64 transform bg-white shadow-lg transition-transform duration-300 lg:hidden"
                style="display: none" x-show="open" x-transition:enter="transform transition ease-out duration-300"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in duration-300" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full">
                <div class="flex items-center justify-between border-b p-4">
                    <div class="flex items-center space-x-2">
                        <div
                            class="flex h-8 w-8 items-center justify-center rounded-full bg-[#5BBD9F] text-sm font-bold text-white">
                            C
                        </div>
                        <h2 class="text-lg font-semibold text-gray-900">CareOn</h2>
                    </div>
                    <button @click="open = false" class="text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <nav class="flex flex-col space-y-4 p-4 text-gray-700">
                    <a href="{{ route('frontend.service') }}" class="hover:text-[#00B686]">Services</a>
                    {{-- <a href="#" class="hover:text-[#00B686]">How CareOn Works</a> --}}
                    <a href="{{ route('frontend.about') }}" class="hover:text-[#00B686]">About</a>
                    <a href="{{ route('frontend.contact-us') }}" class="hover:text-[#00B686]">Contact</a>
                    <a href="{{ route('frontend.blogs') }}" class="hover:text-[#00B686]">Health Tips</a>

                    <hr class="my-4" />

                    {{-- <a href="#" class="hover:text-[#00B686]">Search</a> --}}
                    {{-- <a href="provider-signup.html" class="hover:text-[#00B686]">Register As Care Provider</a> --}}
                    <a href="{{ route('login') }}" class="hover:text-[#00B686]">Sign In</a>
                    <a href="{{ route('frontend.service') }}"
                        class="mt-2 rounded-md bg-[#00B686] px-4 py-2 text-sm text-center font-medium text-white hover:bg-[#00976F]">
                        Book Now
                    </a>
                </nav>
            </div>
        </div>

        @yield("content")
        {{-- <!-- Sing In/Sign Up Form -->
    <div class="my-28 max-w-md mx-auto">
      <!-- Heading -->
      <div class="text-center mb-5">
        <h1 class="text-2xl lg:text-3xl font-bold mb-2">Welcome to CareOn</h1>
        <p class="text-gray-500">
          Sign in or create an account to book services
        </p>
      </div>

      <!-- Card -->
      <div class="rounded-xl border border-gray-200 bg-white text-gray-800 p-6">
        <!-- Tabs -->
        <div
          class="items-center justify-center rounded-lg bg-gray-50 p-1 text-gray-500 grid w-full grid-cols-2 mb-6"
        >
          <button
            @click="tab = 'signin'"
            :class="tab === 'signin' ? 'bg-white text-gray-900 shadow-sm' : ''"
            class="inline-flex items-center justify-center whitespace-nowrap rounded-lg px-3 py-1.5 text-sm"
          >
            Sign In
          </button>
          <button
            @click="tab = 'signup'"
            :class="tab === 'signup' ? 'bg-white text-gray-900 shadow-sm' : ''"
            class="inline-flex items-center justify-center whitespace-nowrap rounded-lg px-3 py-1.5 text-sm font-medium transition-all"
          >
            Sign Up
          </button>
        </div>

        <!-- Sign In Form -->
        <div x-show="tab === 'signin'" x-cloak>
          <form class="space-y-4">
            <div>
              <label for="signin-email" class="text-sm font-medium"
                >Email or Phone</label
              >
              <input
                type="text"
                id="signin-email"
                placeholder="your@email.com or +880..."
                class="flex w-full rounded-xl border border-200 px-3 py-2.5 text-sm focus:outline-none focus:boder-emerald-200 transition duration-300 ease-in-out"
              />
            </div>

            <div>
              <label
                for="signin-password"
                class="text-sm font-medium leading-none"
                >Password</label
              >
              <input
                type="password"
                id="signin-password"
                placeholder="••••••••"
                class="flex w-full rounded-xl border border-200 px-3 py-2.5 text-sm focus:outline-none focus:boder-emerald-200 transition duration-300 ease-in-out"
              />
            </div>

            <div class="flex items-center justify-between text-sm">
              <label class="flex items-center gap-2">
                <input type="checkbox" class="rounded border-gray-300" />
                <span>Remember me</span>
              </label>
              <a
                href="/forgot-password"
                class="text-emerald-600 hover:underline"
                >Forgot password?</a
              >
            </div>

            <button
              type="submit"
              class="bg-emerald-600 hover:bg-emerald-500 text-white rounded-xl py-3 w-full text-sm font-medium transition duration-300 ease-in-out"
            >
              Sign In
            </button>
          </form>
        </div>

        <!-- Sign Up Form -->
        <div x-show="tab === 'signup'" x-cloak>
          <form class="space-y-4">
            <div>
              <label for="signup-name" class="text-sm font-medium"
                >Full Name</label
              >
              <input
                type="text"
                id="signup-name"
                placeholder="John Doe"
                class="flex w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm focus:outline-none focus:border-emerald-200 transition duration-300 ease-in-out"
              />
            </div>
            <div>
              <label for="signup-phone" class="text-sm font-medium"
                >Phone</label
              >
              <input
                type="text"
                id="signup-phone"
                placeholder="+880 1XXX-XXXXXX"
                class="flex w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm focus:outline-none focus:border-emerald-200 transition duration-300 ease-in-out"
              />
            </div>
            <div>
              <label for="signup-email" class="text-sm font-medium"
                >Email</label
              >
              <input
                type="email"
                id="signup-email"
                placeholder="your@email.com"
                class="flex w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm focus:outline-none focus:border-emerald-200 transition duration-300 ease-in-out"
              />
            </div>
            <div>
              <label for="signup-password" class="text-sm font-medium"
                >Password</label
              >
              <input
                type="password"
                id="signup-password"
                placeholder="••••••••"
                class="flex w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm focus:outline-none focus:border-emerald-200 transition duration-300 ease-in-out"
              />
            </div>

            <div class="">
              <span class="text-xs"
                >By signing up, you agree to our
                <span class="text-emerald-500">Terms of Service</span> and
                <span class="text-emerald-500">Privacy Policy</span>
              </span>
            </div>

            <button
              type="submit"
              class="bg-emerald-600 hover:bg-emerald-500 text-white rounded-xl py-3 w-full text-sm font-medium transition duration-300 ease-in-out"
            >
              Create Account
            </button>
          </form>
        </div>

        <!-- Social Login -->
        <div class="mt-6 text-center text-sm text-gray-500">
          <p>Or sign in with</p>
          <div class="mt-3 flex gap-3">
            <button
              class="border border-gray-200 rounded-xl h-10 flex-1 hover:text-gray-900 hover:bg-amber-500 text-sm font-medium transition duration-300 ease-in-out"
            >
              Google
            </button>
            <button
              class="border border-gray-200 rounded-xl h-10 flex-1 hover:text-gray-900 hover:bg-amber-500 text-sm font-medium transition duration-300 ease-in-out"
            >
              Facebook
            </button>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="mt-6 text-center text-sm text-gray-500">
        <p>
          আপনি কি স্বাস্থ্যসেবা পেশাদার? | Are you a healthcare professional?
          <a
            href="/provider-signup"
            class="text-emerald-600 hover:underline font-medium"
          >
            সেবা প্রদানকারী হিসেবে যোগ দিন | Join as a Provider
          </a>
        </p>
      </div>
    </div> --}}
    </body>

</html>
