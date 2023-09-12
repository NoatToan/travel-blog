<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, $next, ...$guards)
    {
        if (!auth()->check()) {
            abort(403);
        }
        $controllerActionName = $request->route()->getActionName();
        $roles = config("permissions.{$controllerActionName}");

        if (empty($roles) || !auth()->user()->inRole($roles)) {
            abort(403);
        }

        return $next($request);
    }
}
