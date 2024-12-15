<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JsonDecrypt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isJson()) {
            // Decode the raw JSON request body
            $decodedData = json_decode($request->getContent(), true); // true converts to an associative array

            // Merge the decoded data into the request, so it can be accessed like normal request data
            $request->merge($decodedData);
        }

        return $next($request);
    }
}
