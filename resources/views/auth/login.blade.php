@php
    $settings = App\Models\Settings::with("siteLogo")->first();
@endphp
@extends("auth.app")
@section("title")
    CareOn - Login
@endsection
{{-- @section("content")
    <div class="w-full mt-36 md:mt-32 max-w-md px-5 lg:px-0">
        <div class="flex justify-center">
            <img src="{{ asset(@$settings->siteLogo?->path) }}" alt="{{ @$settings->site_name }}" class="w-44">
        </div>
        <form method="POST" action="{{ route("login") }}" class="mt-3 space-y-4 px-8 py-3 bg-white rounded-lg shadow-md ">
            @csrf
            <div>
                <label class="block text-gray-600 text-sm">Email</label>
                <input type="email" name="email" placeholder="Enter Email"
                    class="w-full px-4 py-2.5 mt-2 text-sm text-white border border-transparent bg-[#D2AB67] rounded focus:outline-none focus:ring-0 focus:border-transparent placeholder:text-white">
                @error("email")
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-gray-600 text-sm">Password</label>
                <input type="password" name="password" placeholder="Enter Password"
                    class="w-full px-4 py-2.5 mt-2 text-sm text-white border border-transparent bg-[#D2AB67] rounded focus:outline-none focus:ring-0 focus:border-transparent placeholder:text-white">
                @error("password")
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center">
                <input type="checkbox" id="remember_me" name="remember" class="w-4 h-4 rounded cursor-pointer">
                <label for="remember_me" class="ml-2 text-gray-600 text-sm cursor-pointer">Remember me</label>
            </div>
            <div class="flex justify-between items-center">
                @if (Route::has("password.request"))
                    <a href="{{ route("password.request") }}" class="text-sm text-gray-600 underline">Forgot your
                        password?</a>
                @endif
                <button type="submit" class="px-4 py-1.5 text-white text-[15px] bg-slate-900 rounded-md">
                    LOG IN
                </button>
            </div>
        </form>
    </div>
@endsection --}}
@section("content")
    <!-- Sing In/Sign Up Form -->
    <div class="mx-auto my-28 max-w-md">
        <!-- Heading -->
        <div class="mb-5 text-center">
            <h1 class="mb-2 text-2xl font-bold lg:text-3xl">Welcome to CareOn</h1>
            <p class="text-gray-500">
                Sign in or create an account to book services
            </p>
        </div>

        <!-- Card -->
        {{-- <div class="rounded-xl border border-gray-200 bg-white p-6 text-gray-800">
            <!-- Tabs -->
            <div class="mb-6 grid w-full grid-cols-2 items-center justify-center rounded-lg bg-gray-50 p-1 text-gray-500">
                <button @click="tab = 'signin'" :class="tab === 'signin' ? 'bg-white text-gray-900 shadow-sm' : ''"
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-lg px-3 py-1.5 text-sm font-medium">
                    Sign In
                </button>
                <button @click="tab = 'signup'" :class="tab === 'signup' ? 'bg-white text-gray-900 shadow-sm' : ''"
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-lg px-3 py-1.5 text-sm font-medium transition-all">
                    Sign Up
                </button>
            </div>

            <!-- Sign In Form -->
            <div x-show="tab === 'signin'" x-cloak wire:key="signin-form">
                <form method="POST" action="{{ route("login") }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="signin-email" class="text-sm font-medium">Email or Phone</label>
                        <input type="text" name="email" id="signin-email"
                            class="border-200 @error("email") border-red-500 @else border-gray-200 @enderror flex w-full rounded-xl border px-3 py-2.5 text-sm transition duration-300 ease-in-out focus:border-teal-300 focus:outline-none"
                            placeholder="your@email.com or +880..." />
                        @error("email")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="signin-password" class="text-sm font-medium leading-none">Password</label>
                        <input type="password" name="password" id="signin-password"
                            class="border-200 @error("password") border-red-500 @else border-gray-200 @enderror flex w-full rounded-xl border px-3 py-2.5 text-sm transition duration-300 ease-in-out focus:border-emerald-200 focus:outline-none"
                            placeholder="••••••••" />
                        @error("password")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="rounded border-gray-300" />
                            <span class="cursor-pointer">Remember me</span>
                        </label>
                        @if (Route::has("password.request"))
                            <a href="{{ route("password.request") }}" class="text-emerald-600 hover:underline">
                                Forgot your password?
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full rounded-xl bg-emerald-600 py-3 text-sm font-medium text-white transition duration-300 ease-in-out hover:bg-emerald-500">
                        Sign In
                    </button>
                </form>
            </div>

            <!-- Sign Up Form -->
            <div x-show="tab === 'signup'" x-cloak wire:key="signup_form">
                <form method="POST" action="{{ route("register") }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="signup_name" class="text-sm font-medium">Full Name</label>
                        <input type="text" name="signup_name" id="signup_name" placeholder="John Doe"
                            class="flex w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm transition duration-300 ease-in-out focus:border-emerald-200 focus:outline-none" />
                        @error("signup_name")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="signup_phone" class="text-sm font-medium">Phone</label>
                        <input type="text" name="signup_phone" id="signup_phone" placeholder="+880 1XXX-XXXXXX"
                            class="flex w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm transition duration-300 ease-in-out focus:border-emerald-200 focus:outline-none" />
                        @error("signup_phone")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="signup_email" class="text-sm font-medium">Email</label>
                        <input type="email" name="signup_email" id="signup_email" placeholder="your@email.com"
                            class="flex w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm transition duration-300 ease-in-out focus:border-emerald-200 focus:outline-none" />
                        @error("signup_email")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="signup_password" class="text-sm font-medium">Password</label>
                        <input type="password" name="signup_password" id="signup_password" placeholder="••••••••"
                            class="flex w-full rounded-xl border border-gray-200 px-3 py-2.5 text-sm transition duration-300 ease-in-out focus:border-emerald-200 focus:outline-none" />
                        @error("signup_password")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="">
                        <span class="text-xs">By signing up, you agree to our
                            <span class="text-emerald-500">Terms of Service</span> and
                            <span class="text-emerald-500">Privacy Policy</span>
                        </span>
                    </div>

                    <button type="submit"
                        class="w-full rounded-xl bg-emerald-600 py-3 text-sm font-medium text-white transition duration-300 ease-in-out hover:bg-emerald-500">
                        Create Account
                    </button>
                </form>
            </div>

            <!-- Social Login -->
            <div class="mt-6 text-center text-sm text-gray-500">
                <p>Or sign in with</p>

                <div class="mt-3 flex gap-3">

                    <a href="{{ route("social.redirect", "google") }}"
                        class="flex h-10 flex-1 items-center justify-center rounded-xl border border-gray-200 text-sm font-medium transition hover:bg-amber-500 hover:text-gray-900">
                        Google
                    </a>

                    <a href="{{ route("social.redirect", "facebook") }}"
                        class="flex h-10 flex-1 items-center justify-center rounded-xl border border-gray-200 text-sm font-medium transition hover:bg-amber-500 hover:text-gray-900">
                        Facebook
                    </a>

                </div>
            </div>
        </div> --}}
        <div class="rounded-xl border border-gray-200 bg-white p-6 text-gray-800" x-data="{
            tab: '{{ $errors->has("signup_name") || $errors->has("signup_phone") || $errors->has("signup_email") || $errors->has("signup_gender") || $errors->has("signup_division") || $errors->has("signup_password") ? "signup" : "signin" }}'
        }">

            <!-- Tabs -->
            <div class="mb-6 grid w-full grid-cols-2 items-center justify-center rounded-lg bg-gray-50 p-1 text-gray-500">
                <button @click="tab = 'signin'" :class="tab === 'signin' ? 'bg-white text-gray-900 shadow-sm' : ''"
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-lg px-3 py-1.5 text-sm font-medium">
                    Sign In
                </button>

                <button @click="tab = 'signup'" :class="tab === 'signup' ? 'bg-white text-gray-900 shadow-sm' : ''"
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-lg px-3 py-1.5 text-sm font-medium">
                    Sign Up
                </button>
            </div>


            <!-- Sign In Form -->
            <div x-show="tab === 'signin'" x-cloak wire:key="signin-form">
                <form method="POST" action="{{ route("login") }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="text-sm font-medium">Email or Phone</label>
                        <input type="text" name="email"
                            class="@error("email") border-red-500 @else border-gray-200 @enderror w-full rounded-xl border px-3 py-2.5 text-sm transition duration-300 ease-in-out focus:border-emerald-200 focus:outline-none"
                            placeholder="your@email.com or +880..." />

                        @error("email")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="text-sm font-medium">Password</label>
                        <input type="password" name="password"
                            class="@error("password") border-red-500 @else border-gray-200 @enderror w-full rounded-xl border px-3 py-2.5 text-sm transition duration-300 ease-in-out focus:border-emerald-200 focus:outline-none"
                            placeholder="••••••••" />

                        @error("password")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="rounded border-gray-300" />
                            <span class="cursor-pointer">Remember me</span>
                        </label>
                        @if (Route::has("password.request"))
                            <a href="{{ route("password.request") }}" class="text-emerald-600 hover:underline">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full rounded-xl bg-emerald-600 py-3 text-sm font-medium text-white hover:bg-emerald-500">
                        Sign In
                    </button>
                </form>
            </div>


            <!-- Sign Up Form -->
            <div x-show="tab === 'signup'" x-cloak wire:key="signup_form">
                <form method="POST" action="{{ route("register") }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="text-sm font-medium">Full Name *</label>
                        <input type="text" name="signup_name"
                            class="@error("signup_name") border-red-500 @else border-gray-200 @enderror w-full rounded-xl border px-3 py-2.5 text-sm transition duration-300 ease-in-out focus:border-emerald-200 focus:outline-none"
                            placeholder="John Doe" />

                        @error("signup_name")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="text-sm font-medium">Phone *</label>
                        <input type="number" name="signup_phone"
                            class="@error("signup_phone") border-red-500 @else border-gray-200 @enderror w-full rounded-xl border px-3 py-2.5 text-sm transition duration-300 ease-in-out focus:border-emerald-200 focus:outline-none"
                            placeholder="+880 1XXX-XXXXXX" />

                        @error("signup_phone")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="text-sm font-medium">Email *</label>
                        <input type="email" name="signup_email"
                            class="@error("signup_email") border-red-500 @else border-gray-200 @enderror w-full rounded-xl border px-3 py-2.5 text-sm transition duration-300 ease-in-out focus:border-emerald-200 focus:outline-none"
                            placeholder="your@email.com" />

                        @error("signup_email")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-900">Gender *</label>
                        <select name="signup_gender"
                            class="@error("signup_gender") border-red-500 @else border-gray-200 @enderror w-full rounded-xl border border-gray-200 px-4 py-[13px] text-sm focus:border-teal-500 focus:outline-none">
                            <option value="" hidden>-- Select one --</option>
                            @foreach (\App\Enums\Gender::values() as $gender)
                                <option value="{{ $gender }}">{{ $gender }}</option>
                            @endforeach
                        </select>
                        @error("signup_gender")
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-900">Division *</label>
                        <select name="signup_division"
                            class="@error("signup_division") border-red-500 @else border-gray-200 @enderror w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:border-teal-500 focus:outline-none">
                            <option value="" hidden>-- Select one --</option>
                            @foreach (\App\Enums\Division::values() as $division)
                                <option value="{{ $division }}">{{ $division }}</option>
                            @endforeach
                        </select>
                        @error("signup_division")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="text-sm font-medium">Password *</label>
                        <input type="password" name="signup_password"
                            class="@error("signup_password") border-red-500 @else border-gray-200 @enderror w-full rounded-xl border px-3 py-2.5 text-sm transition duration-300 ease-in-out focus:border-emerald-200 focus:outline-none"
                            placeholder="••••••••" />

                        @error("signup_password")
                            <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full rounded-xl bg-emerald-600 py-3 text-sm font-medium text-white hover:bg-emerald-500">
                        Create Account
                    </button>
                </form>
            </div>

            <!-- Social Login -->
            <div class="mt-6 text-center text-sm text-gray-500">
                <p>Or sign in with</p>

                <div class="mt-3 flex gap-3">

                    <a href="{{ route("social.redirect", "google") }}"
                        class="flex h-10 flex-1 items-center justify-center rounded-xl border border-gray-200 text-sm font-medium transition hover:bg-amber-500 hover:text-gray-900">
                        Google
                    </a>

                    {{-- <a href="{{ route("social.redirect", "facebook") }}"
                        class="flex h-10 flex-1 items-center justify-center rounded-xl border border-gray-200 text-sm font-medium transition hover:bg-amber-500 hover:text-gray-900">
                        Facebook
                    </a> --}}

                </div>
            </div>

        </div>

        <!-- Footer -->
        {{-- <div class="mt-6 text-center text-sm text-gray-500">
            <p>
                আপনি কি স্বাস্থ্যসেবা পেশাদার? | Are you a healthcare professional?
                <a href="/provider-signup" class="font-medium text-emerald-600 hover:underline">
                    সেবা প্রদানকারী হিসেবে যোগ দিন | Join as a Provider
                </a>
            </p>
        </div> --}}
    </div>
@endsection
