<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;


class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $permissions = json_decode(Auth::user()->permissions, true);
        if (Auth::user()->is_ceo == 1){
            return $next($request);
        }
        if ($permissions != null) {
            foreach ($permissions as $permission){
                if ( in_array($permission,Session::get('permissions'))) {
                    $request->request->add(['allowed'=>$permission]);
                    return $next($request);
                } else {
                    Flash::warning('Bạn không có quyền sử dụng chức năng này.');
                    return redirect(route('home'));
                }
            }
        } else {
            Flash::warning('Bạn không có quyền sử dụng chức năng này.');
            return redirect(route('home'));
        }
        return $next($request);
    }
}
