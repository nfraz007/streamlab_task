<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Utils\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $is_login = Auth::is_login();

            if ($is_login) {
                return $next($request);
            } else {
                throw new Exception("Invalid Token.");
            }
        } catch (Exception $e) {
            return redirect()->route("login");
        }
        return $next($request);
    }
}
