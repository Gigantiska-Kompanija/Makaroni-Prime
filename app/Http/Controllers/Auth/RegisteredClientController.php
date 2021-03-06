<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredClientController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/.+ .+/u'],
            'email' => 'required|string|email|max:255|unique:client',
            'phone' => 'required|string|max:255|unique:client,phoneNumber',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // fixme: firstName & lastName

        $fullName = explode(' ', $request->name, 2);

        $user = Client::create([
            'firstName' => $fullName[0],
            'lastName' => $fullName[1],
            'email' => $request->email,
            'phoneNumber' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Audit::create('auth-register', $request, $request->email, $user->id);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
