<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {   
        $user = Auth::user();

        // Check if the user has one of the specified roles
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        // Redirect or return response for unauthorized access
        return abort(403, 'Unauthorized.');
    }
}
