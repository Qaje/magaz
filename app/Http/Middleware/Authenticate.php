<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
// use Illuminate\Auth;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // return route('login');
            return route('home');
        }
    }
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $guard = null)
    {
        // dd($request);
        // if (Auth::guard($guard)->guest()) {
            if($this->auth->guard($guard)->guest()){
            // return redirect(RouteServiceProvider::HOME);
            return response('Unauthorized, Please authenticate first','401');
        }

        return $next($request);
    }
}
