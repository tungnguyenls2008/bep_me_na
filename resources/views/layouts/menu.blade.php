

<li class="nav-item">
    <a href="{{ route('menus.index') }}"
       class="nav-link {{ Request::is('menus*') ? 'active' : '' }}">
        <table style="width: -webkit-fill-available;">
        <tr>
            <td width="20%" style="text-align: center"><i class="fas fa-utensils"></i></td>
            <td width="80%" style="text-align: left"><p>Quản lý hàng hóa</p></td>
        </tr>
        </table>
    </a>
</li>




{{--<li class="nav-item">--}}
{{--    <a href="{{ route('checkoutOrders.index') }}"--}}
{{--       class="nav-link {{ Request::is('checkoutOrders*') ? 'active' : '' }}">--}}
{{--        <table style="width: -webkit-fill-available;">--}}
{{--            <tr>--}}
{{--                <td width="20%" style="text-align: center"><i class="fas fa-file-invoice-dollar"></i></td>--}}
{{--                <td width="80%" style="text-align: left"><p>Thống kê doanh thu</p></td>--}}
{{--            </tr>--}}
{{--        </table>--}}

{{--    </a>--}}
{{--</li>--}}


{{--<li class="nav-item">--}}
{{--    <a href="{{ route('notes.index') }}"--}}
{{--       class="nav-link {{ Request::is('notes*') ? 'active' : '' }}">--}}
{{--        <p>Notes</p>--}}
{{--    </a>--}}
{{--</li>--}}


{{--<li class="nav-item">--}}
{{--    <a href="{{ route('customers.index') }}"--}}
{{--       class="nav-link {{ Request::is('customers*') ? 'active' : '' }}">--}}
{{--        <table style="width: -webkit-fill-available;">--}}
{{--            <tr>--}}
{{--                <td width="20%" style="text-align: center"><i class="fas fa-user-tie"></i></td>--}}
{{--                <td width="80%" style="text-align: left"><p>Khách hàng thân thiết</p></td>--}}
{{--            </tr>--}}
{{--        </table>--}}

{{--    </a>--}}
{{--</li>--}}




<li class="nav-item has-treeview nav-pills {{ Request::is('checkoutOrders*')||Request::is('customers*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link parent-link {{ Request::is('checkoutOrders*')||Request::is('customers*') ? 'active' : '' }}">
        <table style="width: -webkit-fill-available;">
            <tr>
                <td width="20%" style="text-align: center"><i class="fas fa-file-invoice-dollar"></i></td>
                <td width="75%" style="text-align: left"><p>Quản lý doanh thu</p></td>
                <td width="5%" style="text-align: right"><i class="right fa fa-angle-left"></i></td>
            </tr>
        </table>
    </a>
    <ul class="nav nav-treeview nav-pills nav-sidebar ">
        <li class="nav-item child-item">
            <a href="{{ route('checkoutOrders.index') }}"
               class="nav-link {{ Request::is('checkoutOrders*') ? 'active' : '' }}">
                <table style="width: -webkit-fill-available;">
                    <tr>
                        <td width="20%" style="text-align: center"><i class="fas fa-file-invoice-dollar"></i></td>
                        <td width="80%" style="text-align: left"><p>Thống kê doanh thu</p></td>
                    </tr>
                </table>

            </a>
        </li>
        <li class="nav-item child-item">
            <a href="{{ route('customers.index') }}"
               class="nav-link {{ Request::is('customers*') ? 'active' : '' }}">
                <table style="width: -webkit-fill-available;">
                    <tr>
                        <td width="20%" style="text-align: center"><i class="fas fa-user-tie"></i></td>
                        <td width="80%" style="text-align: left"><p>Khách hàng thân thiết</p></td>
                    </tr>
                </table>

            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview nav-pills {{ Request::is('rawMaterialImports*')||Request::is('providers*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link parent-link {{ Request::is('rawMaterialImports*')||Request::is('providers*') ? 'active' : '' }}">
        <table style="width: -webkit-fill-available;">
            <tr>
                <td width="20%" style="text-align: center"><i class="fas fa-file-invoice-dollar"></i></td>
                <td width="75%" style="text-align: left"><p>Quản lý chi phí</p></td>
                <td width="5%" style="text-align: right"><i class="right fa fa-angle-left"></i></td>
            </tr>
        </table>
    </a>
    <ul class="nav nav-treeview nav-pills nav-sidebar ">
        <li class="nav-item">
            <a href="{{ route('rawMaterialImports.index') }}"
               class="nav-link {{ Request::is('rawMaterialImports*') ? 'active' : '' }}">
                <table style="width: -webkit-fill-available;">
                    <tr>
                        <td width="20%" style="text-align: center"><i class="fas fa-store"></i></td>
                        <td width="80%" style="text-align: left"><p>Thống kê chi phí</p></td>
                    </tr>
                </table>

            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('providers.index') }}"
               class="nav-link {{ Request::is('providers*') ? 'active' : '' }}">
                <table style="width: -webkit-fill-available;">
                    <tr>
                        <td width="20%" style="text-align: center"><i class="fas fa-shopping-cart"></i></td>
                        <td width="80%" style="text-align: left"><p>Nhà cung cấp</p></td>
                    </tr>
                </table>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview nav-pills {{ Request::is('employees*')||Request::is('positions*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link parent-link {{ Request::is('employees*')||Request::is('positions*') ? 'active' : '' }}">
        <table style="width: -webkit-fill-available;">
            <tr>
                <td width="20%" style="text-align: center"><i class="fas fa-users"></i></td>
                <td width="75%" style="text-align: left"><p>Quản trị nhân viên</p></td>
                <td width="5%" style="text-align: right"><i class="right fa fa-angle-left"></i></td>
            </tr>
        </table>
    </a>
    <ul class="nav nav-treeview nav-pills nav-sidebar ">
        <li class="nav-item">
            <a href="{{ route('employees.index') }}"
               class="nav-link {{ Request::is('employees*') ? 'active' : '' }}">
                <table style="width: -webkit-fill-available;">
                    <tr>
                        <td width="20%" style="text-align: center"><i class="fas fa-users"></i></td>
                        <td width="75%" style="text-align: left"><p>Thống kê nhân viên</p></td>
                    </tr>
                </table>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('positions.index') }}"
               class="nav-link {{ Request::is('positions*') ? 'active' : '' }}">
                <table style="width: -webkit-fill-available;">
                    <tr>
                        <td width="20%" style="text-align: center"><i class="fas fa-briefcase"></i></td>
                        <td width="75%" style="text-align: left"><p>Vị trí làm việc</p></td>
                    </tr>
                </table>
            </a>
        </li>



    </ul>
</li>



