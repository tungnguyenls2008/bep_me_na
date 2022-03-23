<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrganizationRequest;
use App\Models\Models_be\Organization;
use Illuminate\Http\Request;

class LandingController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOrganizationRegistrationForm()
    {
        return view('auth.register-organization');
    }
    public function registerOrganization(CreateOrganizationRequest $request)
    {
        $input = $request->all();

        /** @var Organization $organization */
        $organization = Organization::create($input);
dd($organization);
        Flash::success('Tạo cửa hàng thành công!');

        return redirect(route('login'));
    }
}
