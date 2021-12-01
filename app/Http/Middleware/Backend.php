<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Backend extends Middleware
{
//    /**
//     * Handle an incoming request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \Closure  $next
//     * @return mixed
//     */
//    public function handle(Request $request, Closure $next)
//    {
//        return $next($request);
//    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('backend-login');
        }
    }
//    public function handle($request, Closure $next, $guard = null)
//    {
//        if (Auth::guard('backend')->guest()) {
//            if ($request->ajax() || $request->wantsJson()) {
//                return response('Unauthorized.', 401);
//            } else {
//                return redirect(route('backend-login'));
//            }
//        }
//
//        $response = $next($request);
//
//        $response->headers->set('Access-Control-Allow-Origin' , '*');
//        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
//        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');
//        $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
//        $response->headers->set('Pragma','no-cache'); //HTTP 1.0
//        $response->headers->set('Expires','Sat, 01 Jan 1990 00:00:00 GMT'); // // Date in the past
//
//        return $response;
//
//    }

}
