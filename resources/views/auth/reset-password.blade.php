@extends("auth.app")

@section("content")
<div class="w-full max-w-lg mx-auto mt-40">

    <div class="bg-white rounded-2xl p-8 border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">
            Reset Your Password
        </h2>

        <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div>
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>

                <input id="email" type="email" name="email"
                    value="{{ old('email', $request->email) }}"
                    required autofocus autocomplete="username"
                    class="mt-1 w-full rounded-xl border @error('email') border-red-500 @else border-gray-300 @enderror 
                    px-3 py-2.5 text-sm focus:outline-none focus:border-emerald-400" />

                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="text-sm font-medium text-gray-700">New Password</label>

                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="mt-1 w-full rounded-xl border @error('password') border-red-500 @else border-gray-300 @enderror 
                    px-3 py-2.5 text-sm focus:outline-none focus:border-emerald-400" />

                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="text-sm font-medium text-gray-700">
                    Confirm Password
                </label>

                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password"
                    class="mt-1 w-full rounded-xl border @error('password_confirmation') border-red-500 @else border-gray-300 @enderror
                    px-3 py-2.5 text-sm focus:outline-none focus:border-emerald-200" />

                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-medium py-2.5 rounded-xl
                transition">
                Reset Password
            </button>

        </form>
    </div>
</div>
@endsection