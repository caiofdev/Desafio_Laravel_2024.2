<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        if(Auth::guard('manager')->check()){
            return redirect()->route('manager.dashboard');
        } else if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        } 

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        } else if(Auth::guard('manager')->attempt($credentials)){
            return redirect()->route('manager.dashboard');
        } else if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }

        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if(Auth::guard('web')->check()){
            Auth::guard('web')->logout();
        } else if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        } else if(Auth::guard('manager')->check()){
            Auth::guard('manager')->logout();
        }else{
            return redirect('/');
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
