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
    * Show all users that are enabled
    */
    public function index(): View
    {
        return view('users.index');
    }

    public function show(User $user): View
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function requests(): View
    {
        return view('users.requests');
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function createDonator(): View
    {
        return view('auth.register-donator');
    }

    public function createDistributor(): View
    {
        return view('auth.register-distributor');
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
            'regno' => ['required', 'string', 'max:255', 'unique:' . User::class],
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

        return redirect(route('login'))->with('msg', 'Request sent successfully. You will be informed when your account is activated');
    }
}
