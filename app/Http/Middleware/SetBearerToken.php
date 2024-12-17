<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SetBearerToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = null;
        if ($request->expectsJson() && $request->hasCookie('freshtrack_token')) {
            $token = $request->cookie('freshtrack_token');

            try {
                $request->headers->set('Authorization', "Bearer $token");
            } catch (\Exception $exception) {
                // do nothing
            }
        }

        return $next($request);
    }
}
