<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DistributorProfile;
use App\Models\DonatorProfile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'regno' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'regno' => $request->regno,
            'address' => $request->address,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);

        //if user is created successfully, Check type of user created and create profiles accordingly
        if ($user) {
            if ($user->type == 'donator') {

                $request->validate([
                    'donator_name' => ['required', 'string', 'max:255'],
                    'registration' => ['required', 'string', 'max:255'],
                    'business_address' => ['required', 'string', 'max:255'],
                ]);

                DonatorProfile::create([
                    'user_id' => $user->id,
                    'donator_name' => $request->donator_name,
                    'registration' => $request->registration,
                    'business_address' => $request->business_address,
                ]);
            } else if ($user->type == 'distributor') {

                $request->validate([
                    'license_no' => ['required', 'string', 'max:255'],
                ]);

                DistributorProfile::create([
                    'user_id' => $user->id,
                    'license_no' => $request->license_no
                ]);
            }
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
