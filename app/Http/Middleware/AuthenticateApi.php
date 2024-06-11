<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateApi
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('X-Access-Token');

        if ($token !== env('ACCESS_TOKEN')) {
            Log::info('Token ('. $token .') mismatch for '. $request->ip());
            abort(401);
        }

        return $next($request);
    }
}
