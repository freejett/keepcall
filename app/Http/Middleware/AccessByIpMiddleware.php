<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class AccessByIpMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!in_array($request->ip(), (array) config('log.allowed_ips'))) {
            Log::info('Access denied for '. $request->ip());

            return response()->json([
                'message' => "You don't have permission to access this website."
            ], 401);
        }

        return $next($request);
    }
}
