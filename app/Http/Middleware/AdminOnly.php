<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if (auth()->guard('admin')->user() === null) {
            throw new UnauthorizedHttpException('');
        }

        return $next($request);
    }
}