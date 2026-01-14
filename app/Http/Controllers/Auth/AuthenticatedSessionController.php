<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        // Only set intended URL if not already set AND user came from frontend
        if (!session()->has('url.intended') && url()->previous() !== url()->current()) {
            session(['url.intended' => url()->previous()]);
        }

        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $loginInput = trim($request->email);
        $password = $request->password;

        // Detect email or phone
        if (filter_var($loginInput, FILTER_VALIDATE_EMAIL)) {
            $fieldType = 'email';
        } else {
            $fieldType = 'phone';
            $loginInput = preg_replace('/\D/', '', $loginInput);
        }

        // Attempt login
        if (!Auth::attempt([$fieldType => $loginInput, 'password' => $password], $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'Invalid email/phone or password.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        $user = Auth::user();

        // Check if email is verified (email_verified_at must NOT be null)
        if (is_null($user->email_verified_at)) {
            Auth::logout();

            return back()->withErrors([
                'email' => 'Your email is not verified.',
            ])->withInput();
        }

        // If an intended URL exists, redirect there first
        if (session()->has('url.intended')) {
            return redirect()->intended();
        }

        // Redirect based on role
        return $user->hasRole('user')
            ? redirect()->intended(RouteServiceProvider::User_HOME)
            : redirect()->intended(route('dashboard', absolute: false));
    }
    
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
