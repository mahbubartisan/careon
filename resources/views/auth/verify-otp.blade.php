@extends("auth.app")
@section("title")
    CareOn - OTP Verification
@endsection

@section("content")
    <div class="flex min-h-screen items-center justify-center">
        <form method="POST" action="{{ route("otp.verify", $user->id) }}"
            class="mx-auto mt-16 max-w-lg space-y-4 border border-gray-200 rounded-lg bg-white p-6 shadow-sm">
            @csrf

            <h2 class="text-center text-lg font-semibold">
                Verify Your Phone Number
            </h2>

            <p class="text-center text-sm text-gray-500">
                We sent a 6-digit code to {{ $user->phone }}
            </p>

            <div>
                <input type="number" name="otp" maxlength="6"
                    class="mb-1 w-full rounded-xl border border-gray-200 px-3 py-2 text-center text-base tracking-widest focus:border-teal-200 focus:outline-none"
                    placeholder="Enter OTP">

                @error("otp")
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full rounded bg-teal-600 py-2 text-white hover:bg-teal-700">
                Verify
            </button>
        </form>
    </div>
@endsection
