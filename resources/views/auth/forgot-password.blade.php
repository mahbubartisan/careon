{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
</div>

<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            {{ __('Email Password Reset Link') }}
        </x-primary-button>
    </div>
</form>
</x-guest-layout> --}}
@php
    $settings = App\Models\Settings::with("siteLogo")->first();
@endphp
@extends("auth.app")
@section("title")
    CareOn - Forgot Password
@endsection
@section("content")
    <div class="flex min-h-screen items-center justify-center">
        {{-- <div class="flex flex-col items-center"> --}}
            {{-- <img src="{{ asset(@$settings->siteLogo?->path) }}" alt="CareOn Logo" class="h-44 w-44 object-contain"> --}}
            <div class="-mt-9 w-full max-w-md rounded-2xl border border-gray-200 bg-white p-8 px-7 py-4">
                <p class="text-sm text-gray-600">Forgot your password? No problem. Just let us know your email address and we
                    will email you a password
                    reset link that will allow you to choose a new one.</p>
                <form method="POST" action="{{ route("password.email") }}" class="mt-2">
                    @csrf
                    <div>
                        <label class="block text-sm text-gray-700">Email *</label>
                        <input type="email" name="email" placeholder="Enter Email"
                            class="mt-2 w-full rounded-xl border border-gray-200 px-3 py-3 text-sm focus:border-teal-200 focus:outline-none"
                            autofocus>
                        @error("email")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        @if (session("status"))
                            <p class="mt-1 text-xs text-green-600">
                                {{ session("status") }}
                            </p>
                        @endif
                    </div>
                    <div class="mt-4 flex items-center justify-end">
                        <button type="submit" class="rounded-md bg-slate-900 px-4 py-1.5 text-[15px] text-white">
                            Email Password Reset Link
                        </button>
                    </div>
                </form>
            </div>
        {{-- </div> --}}
    </div>
@endsection
