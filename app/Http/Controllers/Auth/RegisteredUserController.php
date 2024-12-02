<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'avatar' => ['string'],
            'bio' => ['string'],
            'gender' => ['string'],
            'date_of_birth' => ['date']

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
            'avatar' => $request->avatar,
            'bio' => $request->bio,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->json([
            'user' => $user
        ], 201);  // Codice HTTP 201 per "Created"
    }
}
