

<li class="nav-item">
    <a href="{{ route('menus.index') }}"
       class="nav-link {{ Request::is('menus*') ? 'active' : '' }}">
        <i class="fas fa-utensils"></i>  <p>Thực đơn</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('rawMaterialImports.index') }}"
       class="nav-link {{ Request::is('rawMaterialImports*') ? 'active' : '' }}">
        <i class="fas fa-store"></i>  <p>Thống kê chi phí</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('checkoutOrders.index') }}"
       class="nav-link {{ Request::is('checkoutOrders*') ? 'active' : '' }}">
        <i class="fas fa-file-invoice-dollar"></i>  <p>Thống kê doanh thu</p>
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
        <i class="fas fa-user-tie"></i>  <p>Dữ liệu khách hàng</p>
    </a>
</li>


