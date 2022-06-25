<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        $validateFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (User::where('email', $validateFields['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'This email is use'
            ]);
        }

        $user = User::create($validateFields);
        if ($user) {
            event(new Registered($user));
            Auth::login($user);
            return redirect(route('verification.notice'));
        }

        return redirect(route('user.login'))->withErrors([
            'formError' => 'Error save user'
        ]);
    }
}
