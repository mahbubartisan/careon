<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
// {
//     // Step 1: Redirect to Google/Facebook
//     public function redirect($provider)
//     {
//         return Socialite::driver($provider)->redirect();
//     }

//     // Step 2: Handle callback
//     public function callback($provider)
//     {
//         $socialUser = Socialite::driver($provider)->stateless()->user();

//         // Find existing user or create a new one
//         $user = User::where('email', $socialUser->getEmail())->first();

//         if (!$user) {
//             $user = User::create([
//                 'name'        => $socialUser->getName(),
//                 'email'       => $socialUser->getEmail(),
//                 'provider'    => $provider,
//                 'provider_id' => $socialUser->getId(),
//                 'password'    => bcrypt(str()->random(16)),
//             ]);

//             $user->assignRole('user'); // Assign default role
//         }

//         Auth::login($user);

//         // Redirect based on role
//         if ($user->hasRole('user')) {
//             return redirect()->intended(RouteServiceProvider::User_HOME);
//         }

//         return redirect()->intended(route('dashboard'));
//     }
// }
{
    // Step 1: Redirect to Google/Facebook
    public function redirect($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    // Step 2: Handle callback
    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'social' => 'Failed to login using ' . ucfirst($provider)
            ]);
        }

        // Safety check for providers not returning email
        if (!$socialUser->getEmail()) {
            return redirect()->route('login')->withErrors([
                'email' => 'Your ' . ucfirst($provider) . ' account has no email address.'
            ]);
        }

        // Check if user already exists by provider_id
        $user = User::where('provider', $provider)
            ->where('provider_id', $socialUser->getId())
            ->first();

        // If not found, check by email (same user using new provider)
        if (!$user) {
            $user = User::where('email', $socialUser->getEmail())->first();
        }

        // Create new user if not found
        if (!$user) {
            $user = User::create([
                'name'        => $socialUser->getName() ?? $socialUser->getNickname(),
                'email'       => $socialUser->getEmail(),
                'provider'    => $provider,
                'provider_id' => $socialUser->getId(),
                'password'    => bcrypt(str()->random(16)), // random placeholder
            ]);

            $user->assignRole('user'); // default role
        }

        // Ensure provider fields are saved (first time login with Google/Facebook)
        if (!$user->provider || !$user->provider_id) {
            $user->update([
                'provider'    => $provider,
                'provider_id' => $socialUser->getId(),
            ]);
        }

        // Login user
        Auth::login($user, true);

        // Role-based redirect
        if ($user->hasRole('user')) {
            return redirect()->intended(RouteServiceProvider::User_HOME);
        }

        return redirect()->intended(route('dashboard'));
    }
}