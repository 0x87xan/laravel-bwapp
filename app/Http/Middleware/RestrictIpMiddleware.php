<?php

namespace App\Http\Middleware;

use App\Models\RestrictedIps;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class RestrictIpMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $throttleKey = $this->throttleKey($request);
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $ipAddress = $request->ip();
            $restrictedIp = RestrictedIps::where('ip', $ipAddress)->first();
            if (!$restrictedIp) {
                RestrictedIps::create([
                    'ip' => $ipAddress
                ]);
                abort(403, 'Forbidden');
            }elseif ($restrictedIp->created_at->lessThan(now()->subMinute())){
                $restrictedIp->delete();
            }
            abort(403, 'Forbidden');
        }

        RateLimiter::hit($throttleKey);

        return $next($request);
    }

    public function throttleKey(Request $request): string
    {
        return Str::lower($request->ip());
    }
}

