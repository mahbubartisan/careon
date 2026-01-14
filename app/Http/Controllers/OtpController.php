<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function show(User $user)
    {
        return view('auth.verify-otp', compact('user'));
    }

    public function verify(Request $request, User $user)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        if (
            $user->otp !== $request->otp ||
            Carbon::now()->gt($user->otp_expires_at)
        ) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP']);
        }

        // Mark phone as verified
        $user->update([
            'phone_verified_at' => now(),
            'otp' => null,
            'otp_expires_at' => null,
        ]);

        // Login user
        Auth::login($user);

        // If an intended URL exists, redirect there first
        if (session()->has('url.intended')) {
            return redirect()->intended();
        }
        return redirect()->intended(RouteServiceProvider::User_HOME);
    }
}
