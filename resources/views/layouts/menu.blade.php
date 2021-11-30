

<li class="nav-item">
    <a href="{{ route('menus.index') }}"
       class="nav-link {{ Request::is('menus*') ? 'active' : '' }}">
        <table style="width: -webkit-fill-available;">
        <tr>
            <td width="20%" style="text-align: center"><i class="fas fa-utensils"></i></td>
            <td width="80%" style="text-align: left"><p>Quản lý thực đơn</p></td>
        </tr>
        </table>
    </a>
</li>

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


{{--<li class="nav-item">--}}
{{--    <a href="{{ route('notes.index') }}"--}}
{{--       class="nav-link {{ Request::is('notes*') ? 'active' : '' }}">--}}
{{--        <p>Notes</p>--}}
{{--    </a>--}}
{{--</li>--}}


<li class="nav-item">
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


