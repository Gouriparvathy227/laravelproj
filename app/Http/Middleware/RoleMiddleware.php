<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Usage: role:student OR role:super_admin,dept_admin
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        $allowedRoles = array_map('trim', explode(',', $roles));
        $user = $request->user();

        if (!$user || !in_array($user->role, $allowedRoles, true)) {
            abort(403, 'You do not have permission to access this area.');
        }

        return $next($request);
    }
}
