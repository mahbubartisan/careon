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
Forgot Password
@endsection
@section("content")
<div class="w-full max-w-md mx-auto mt-40">
    <div class="flex flex-col items-center">
        <img src="{{ asset(@$settings->siteLogo?->path) }}" alt="Laravel Logo" class="w-44 h-44 object-contain">
        <div class="w-full max-w-md px-7 py-4 bg-white -mt-9 bg-white rounded-2xl p-8 border border-gray-200">
            <p class="text-sm text-gray-600">Forgot your password? No problem. Just let us know your email address and we
                will email you a password
                reset link that will allow you to choose a new one.</p>
            <form method="POST" action="{{ route('password.email') }}" class="mt-2">
                @csrf
                <div>
                    <label class="block text-gray-600 text-sm">Email</label>
                    <input type="email" name="email" placeholder="Enter Email"
                        class="w-full px-3 py-2.5 mt-2 text-sm border border-gray-200 rounded-xl focus:outline-none focus:border-emerald-200"
                        autofocus>
                    @error("email")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    @if (session('status'))
                    <p class="text-xs text-green-600 mt-1">
                        {{ session('status') }}
                    </p>
                    @endif
                </div>
                <div class="flex justify-end items-center mt-4">
                    <button type="submit" class="px-4 py-1.5 text-white text-[15px] bg-slate-900 rounded-md">
                        Email Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection