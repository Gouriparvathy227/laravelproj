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
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $role = (string) $request->input('login_role', 'admin');
        $roleMap = [
            'admin' => ['super_admin', 'dept_admin'],
            'faculty' => ['faculty'],
            'student' => ['student'],
        ];

        if (!in_array($request->user()?->role, $roleMap[$role] ?? [], true)) {
            Auth::guard('web')->logout();

            return back()->withErrors([
                'email' => 'Invalid login portal for your role.',
            ])->withInput($request->only('email', 'login_role'));
        }

        $request->session()->regenerate();

        $userRole = $request->user()?->role;

        return redirect()->intended(match ($userRole) {
            'super_admin', 'dept_admin' => route('admin.dashboard', absolute: false),
            'faculty' => route('faculty.dashboard', absolute: false),
            'student' => route('student.dashboard', absolute: false),
            default => route('dashboard', absolute: false),
        });
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
