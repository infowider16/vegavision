<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class AdminOnlineMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check admin online status from cache
        if (!Cache::get('admin_online', false)) {
            return response()->json(['error' => 'Admin is offline'], 403);
        }
        return $next($request);
    }
}
