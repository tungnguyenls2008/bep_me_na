<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Menu;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;

class MenuController extends AppBaseController
{


    /**
     * Display a listing of the Menu.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index(Request $request)
    {

        /** @var Menu $menus */
        $menus = Menu::OrderBy('created_at', 'desc')->paginate(15);
        if ($menus->isEmpty()) {
            Flash::warning('Bạn chưa đăng ký sản phẩm nào.');
        }

        return view('menus.index')
            ->with('menus', $menus);
    }
    public function search(Request $request)
    {
        $search = $request->post();
        $menu = Menu::where(['deleted_at' => null])->OrderBy('created_at', 'desc');
        if (isset($search['id'])) {
            $menu->where(['id'=>$search['id']]);
        }
        if (isset($search['price_from']) || isset($search['price_to'])) {
            if (!isset($search['price_from'])) {
                $search['price_from'] = 0;
            }
            if (!isset($search['price_to'])) {
                $search['price_to'] = 2000000000;
            }

            $menu->whereBetween('price', [$search['price_from'], $search['price_to']]);
        }
        if (isset($search['count_from']) || isset($search['count_to'])) {
            if (!isset($search['count_from'])) {
                $search['count_from'] = 0;
            }
            if (!isset($search['count_to'])) {
                $search['count_to'] = 999999;
            }

            $menu->whereBetween('count', [$search['count_from'], $search['count_to']]);
        }

        if (isset($search['status'])) {
            $menu->where(['status' => $search['status']]);
        }

        $menu = $menu->paginate(15);
        return view('menus.index')
            ->with('menus', $menu,)->with('count', $menu->total());
    }

    /**
     * Show the form for creating a new Menu.
     *
     * @return Response
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created Menu in storage.
     *
     * @param CreateMenuRequest $request
     *
     * @return Response
     */
    public function store(CreateMenuRequest $request)
    {
        $input = $request->all();

        /** @var Menu $menu */
        $menu = new Menu();
        $menu->fill($input);
        $menu->count = 0;
        $menu->status = 0;
        $menu->save();
        Flash::success('Tạo mới sản phẩm thành công.');

        return redirect(route('menus.index'));
    }

    /**
     * Display the specified Menu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Menu $menu */
        $menu = Menu::find($id);

        if (empty($menu)) {
            Flash::error('Không tìm thấy sản phẩm.');

            return redirect(route('menus.index'));
        }

        return view('menus.show')->with('menu', $menu);
    }

    /**
     * Show the form for editing the specified Menu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Menu $menu */
        $menu = Menu::find($id);

        if (empty($menu)) {
            Flash::error('Không tìm thấy sản phẩm');

            return redirect(route('menus.index'));
        }

        return view('menus.edit')->with('menu', $menu);
    }

    /**
     * Update the specified Menu in storage.
     *
     * @param int $id
     * @param UpdateMenuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMenuRequest $request)
    {
        /** @var Menu $menu */
        $menu = Menu::find($id);

        if (empty($menu)) {
            Flash::error('Không tìm thấy sản phẩm');

            return redirect(route('menus.index'));
        }

        $menu->fill($request->all());
        $menu->save();

        Flash::success('Cập nhật sản phẩm thành công.');

        return redirect(route('menus.index'));
    }

    /**
     * Remove the specified Menu from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
//        /** @var Menu $menu */
//        $menu = Menu::find($id);
//
//        if (empty($menu)) {
//            Flash::error('Menu not found');
//
//            return redirect(route('menus.index'));
//        }
//
//        $menu->delete();
//
//        Flash::success('Menu deleted successfully.');
//
//        return redirect(route('menus.index'));
    }

    public function toggleStatus(Request $request)
    {
        $order = Menu::find($request->id);
        if ($order->status == 0) {
            $order->status = 1;
        } elseif ($order->status == 1) {
            $order->status = 0;
        }

        if ($order->save()) {
            Flash::success('Chuyển đổi trạng thái mặt hàng thành công!');
            return redirect(route('menus.index'));
        }
    }
}
