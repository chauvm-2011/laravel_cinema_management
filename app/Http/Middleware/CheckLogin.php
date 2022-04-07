<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() || Auth::viaRemember()) {
            if (Auth::user()->email_verified_at !== null) {
                return $next($request);
            } else {
                Auth::logout();
                return redirect()->route('login')->with('error', 'The account has not been verified. Please  <a href ="https://mail.google.com">click here to verify your account</a>');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
