<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Проверяет, соответствует ли роль пользователя требуемой.
     *
     * @param Request $request
     * @param Closure $next
     * @param  string  $role Требуемая роль (например, 'admin')
     * @return Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = Auth::user();

        if (!$user || $user->role->value !== $role) {
            abort(403, 'Нет доступа.');
        }

        return $next($request);
    }
}
