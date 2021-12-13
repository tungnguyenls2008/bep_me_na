<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Models_be\Organization;
use App\Models\Models_be\Product;
use App\Models\Profile;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Session;
use Response;

class ProfileController extends AppBaseController
{
//    /**
//     * Display a listing of the Profile.
//     *
//     * @param Request $request
//     *
//     * @return Response
//     */
//    public function index(Request $request)
//    {
//        /** @var Profile $profiles */
//        $profiles = Profile::all();
//
//        return view('profiles.index')
//            ->with('profiles', $profiles);
//    }

//    /**
//     * Show the form for creating a new Profile.
//     *
//     * @return Response
//     */
//    public function create()
//    {
//        return view('profiles.create');
//    }
//
//    /**
//     * Store a newly created Profile in storage.
//     *
//     * @param CreateProfileRequest $request
//     *
//     * @return Response
//     */
//    public function store(CreateProfileRequest $request)
//    {
//        $input = $request->all();
//        /** @var Profile $profile */
//        $profile = Profile::create($input);
//
//        Flash::success('Profile saved successfully.');
//
//        return redirect(route('profiles.index'));
//    }

    /**
     * Display the specified Profile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Profile $profile */
        $profile = Profile::find($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.show')->with('profile', $profile);
    }
    public function showLanding($id)
    {
        /** @var Profile $profile */
        $profile = Profile::find($id);
        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.show-landing')->with('profile', $profile);
    }
    /**
     * Show the form for editing the specified Profile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Profile $profile */
        $profile = Profile::find($id);
        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.show'));
        }

        return view('profiles.edit')->with('profile', $profile);
    }

    /**
     * Update the specified Profile in storage.
     *
     * @param int $id
     * @param UpdateProfileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfileRequest $request)
    {
        /** @var Profile $profile */
        $profile = Profile::find($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }
        if ($request->file('logo') !== null) {
            $image = $request->file('logo');
            $image->move('img/organization_logos', Session::get('connection')['db_name'] . '.png')->getPathname();
            $org=Organization::withoutTrashed()->where(['profile_id'=>$id])->first();
            $org->logo='img/organization_logos/'.Session::get('connection')['db_name'] . '.png';
            $org->save();
        }
        $profile->fill($request->all());
        $profile->product_ids = json_encode($request->all()['product_ids']);
        $profile->save();

        Flash::success('Cập nhật thông tin cửa hàng thành công!');

        return redirect(route('profiles.show', $profile));
    }

//    /**
//     * Remove the specified Profile from storage.
//     *
//     * @param int $id
//     *
//     * @return Response
//     * @throws \Exception
//     *
//     */
//    public function destroy($id)
//    {
//        /** @var Profile $profile */
//        $profile = Profile::find($id);
//
//        if (empty($profile)) {
//            Flash::error('Profile not found');
//
//            return redirect(route('profiles.index'));
//        }
//
//        $profile->delete();
//
//        Flash::success('Profile deleted successfully.');
//
//        return redirect(route('profiles.index'));
//    }

    public function getProductIds(Request $request)
    {
        $industry_ids = $request->all()['ids'];
        $products = Product::withoutTrashed()->where(['industry_id' => $industry_ids])->get();
        $product_select = '';
        foreach ($products as $product) {
            $product_select .= "<option value='$product->id'>$product->name</option>";
        }
        $product_selected = [];
        if (isset($request->all()['profile_id'])){
            $profile = Profile::where(['id' => $request->all()['profile_id']])->first();
            if ($profile != null) {
                $product_selected = json_decode($profile->product_ids, true);
            }
        }
        return [
            'product_select' => $product_select,
            'product_selected' => $product_selected
        ];
    }
}
