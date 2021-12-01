<?php

namespace App\Http\Controllers\Controllers_be\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/backend/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }
    protected function guard()
    {
        return Auth::guard('backend');
    }
//    public function postLogin(Request $request)
//    {
//        $this->validate($request, [
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//        if (auth()->guard('backend')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
//        {
//            $user = auth()->guard('backend')->user();
//
//            \Session::put('success','You are Login successfully!!');
//            return redirect()->route('backend-home');
//
//        } else {
//            return back()->with('error','your username and password are wrong.');
//        }
//
//    }
//    public function logout()
//    {
//        auth()->guard('backend')->logout();
//        \Session::flush();
//        \Sessioin::put('success','You are logout successfully');
//        return redirect(route('backend-login-view'));
//    }
}
