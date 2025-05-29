<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            Log::warning('Unauthenticated access attempt to admin area');
            return redirect()->route('login');
        }

        $user = Auth::user();
        Log::info('Admin middleware check:', ['user_id' => $user->id, 'role' => $user->role]);

        if ($user->role !== 'admin') {
            Log::warning('Non-admin access attempt:', ['user_id' => $user->id, 'role' => $user->role]);
            return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập trang này.');
        }

        return $next($request);
    }
}
