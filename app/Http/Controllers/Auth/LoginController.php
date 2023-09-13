<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index(Request $request): View
    {
        return view('auth.login.index', ['url' => Socialite::driver('google')->stateless()->redirect()->getTargetUrl()]);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $fieldType = filter_var($validated['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (auth()->attempt([$fieldType => $validated['username'], 'password' => $validated['password']], $request['remember_me'])) {
            return redirect(route('home.index'));
        } else {
            throw ValidationException::withMessages([
                'username' => __('validation.wrong_credential'),
            ]);
        }
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect(route('login.index'));
    }
}
