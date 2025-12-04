<!-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> -->
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-bold mb-4">Verify Your Email</h2>

    <p class="text-gray-600">
        We’ve sent a verification link to your email address.
        Please check your inbox and click the verification link.
    </p>

    @if (session('message'))
    <p class="mt-4 text-green-600 text-sm">{{ session('message') }}</p>
    @endif

    <form method="POST" action="{{ route('verification.resend') }}" class="mt-6">
        @csrf
        <button class="w-full bg-emerald-600 text-white py-2 rounded">
            Resend Verification Email
        </button>
    </form>
</div>