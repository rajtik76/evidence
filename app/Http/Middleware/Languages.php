<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Languages
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('locale') && array_key_exists(session()->get('locale'), config('languages'))) {
            app()->setLocale(session()->get('locale'));
        } else {
            app()->setLocale(config('app.fallback_locale'));
        }

        return $next($request);
    }
}
