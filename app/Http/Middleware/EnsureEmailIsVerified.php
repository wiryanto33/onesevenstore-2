<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (! $request->user() ||
        //     ($request->user() instanceof MustVerifyEmail &&
        //     ! $request->user()->hasVerifiedEmail())) {
        //     return redirect()->route('verification.notice');
        // }

        return $next($request);
    }
}
