<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EnsureIsAdmin {
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        if (Auth::guard('manager')->check()) {
            if (Auth::guard('manager')->user()->admin) {
                // :checkmark:
                return $next($request);
            }
        }
        throw new NotFoundHttpException();
    }
}
