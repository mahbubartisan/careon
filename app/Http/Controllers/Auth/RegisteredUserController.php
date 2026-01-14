<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyUserEmail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\SmsService;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ])->assignRole('User');


    //     Auth::login($user);
    //     return redirect(RouteServiceProvider::User_HOME);
    // }

    public function store(RegisterRequest $request)
    {
        // Create user
        $user = User::create([
            'name'     => $request->signup_name,
            'phone'    => $request->signup_phone,
            'email'    => $request->signup_email,
            'division' => $request->signup_division,
            'gender'   => $request->signup_gender,
            'password' => Hash::make($request->signup_password),
        ]);

        // // Assign default user role
        // $user->assignRole('user');

        // // event(new Registered($user));
        // // Send verification email
        // Mail::to($user->email)->send(new VerifyUserEmail($user));

        // // Auth::login($user);

        // return redirect()->intended(RouteServiceProvider::User_HOME);

        // Assign role
        $user->assignRole('user');

        // Generate OTP
        $otp = rand(100000, 999999);

        // Save OTP
        $user->update([
            'otp' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(5),
        ]);

        $message = "CareOn OTP: {$otp}";

        SmsService::send($user->phone, $message);


        // Send OTP via SMS
        // SmsService::send(
        //     $user->phone,
        //     "Your CareOn verification code is {$otp}. It will expire in 5 minutes."
        // );

        // Redirect to OTP verification page
        return redirect()->route('otp.verify.form', $user->id);
    }
}
