<li class="app-sidebar__heading">Sản phẩm</li>

<li class="nav-item">
    <a href="{{ route('menus.index') }}" class="{{ Request::is('menus*') ? 'mm-active' : '' }}">
        <i class="metismenu-icon pe-7s-gift "></i>
        Quản lý sản phẩm
    </a>

</li>

<li class="app-sidebar__heading">Doanh thu</li>


<li class="{{ Request::is('checkoutOrders*')||Request::is('customers*') ? 'menu-open' : '' }}">
    <a href="#" class="{{ Request::is('checkoutOrders*')||Request::is('customers*') ? 'mm-active' : '' }}">
        <i class="metismenu-icon pe-7s-cash"></i>
        Quản lý doanh thu
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul class="nav nav-treeview nav-pills nav-sidebar {{ Request::is('checkoutOrders*')||Request::is('customers*') ? 'mm-show' : '' }} ">
        <li class="nav-item child-item">
            <a href="{{ route('checkoutOrders.create') }}" class="{{ Request::is('*create') ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-cash"></i>
                Tạo mới
            </a>
        </li>
        <li class="nav-item child-item">
            <a href="{{ route('checkoutOrders.index') }}"
               class="{{ Request::is('checkoutOrders') ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-cash"></i>
                Thống kê
            </a>
        </li>
        <li class="nav-item child-item">
            <a href="{{ route('customers.index') }}" class="{{ Request::is('customers*') ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-cash"></i>
                Khách hàng thân thiết
            </a>

        </li>
    </ul>
</li>
<li class="app-sidebar__heading">Chi phí</li>

<li class="nav-item has-treeview nav-pills {{ Request::is('rawMaterialImports*')||Request::is('providers*') ? 'menu-open' : '' }}">
    <a href="#" class="{{ Request::is('rawMaterialImports*')||Request::is('providers*') ? 'mm-active' : '' }}">
        <i class="metismenu-icon pe-7s-cash"></i>
        Quản lý chi phí
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul class="nav nav-treeview nav-pills nav-sidebar {{ Request::is('rawMaterialImports*')||Request::is('providers*') ? 'mm-show' : '' }}">
        <li class="nav-item">
            <a href="{{ route('rawMaterialImports.create') }}" class="{{ Request::is('*create') ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-cash"></i>
                Tạo mới
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('rawMaterialImports.index') }}"
               class="{{ Request::is('rawMaterialImports') ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-cash"></i>
                Thống kê
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('providers.index') }}" class="{{ Request::is('providers*') ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-cash"></i>
                Nhà cung cấp
            </a>
        </li>
    </ul>
</li>
<li class="app-sidebar__heading">Nhân sự</li>

<li class="nav-item has-treeview nav-pills {{ Request::is('employees*')||Request::is('positions*') ? 'menu-open' : '' }}">
    <a href="#" class="{{ Request::is('employees*')||Request::is('positions*') ? 'mm-active' : '' }}">
        <i class="metismenu-icon pe-7s-users"></i>
        Quản trị nhân sự
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>

    <ul class="nav nav-treeview nav-pills nav-sidebar {{ Request::is('employees*')||Request::is('positions*') ? 'mm-show' : '' }}">
        <li class="nav-item">
            <a href="{{ route('employees.index') }}" class="{{ Request::is('employees*') ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-cash"></i>
                Thống kê
            </a>

        </li>
        <li class="nav-item">
            <a href="{{ route('positions.index') }}" class="{{ Request::is('positions*') ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-cash"></i>
                Vị trí làm việc
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="">
                <i class="metismenu-icon pe-7s-cash"></i>
                Chấm công
            </a>

        </li>


    </ul>
</li>
<li class="app-sidebar__heading">Cài đặt</li>

<li class="nav-item has-treeview nav-pills {{ Request::is('units*')? 'mm-active' : '' }}">
    <a href="#" class="{{ Request::is('units*')? 'mm-active' : '' }}">
        <i class="metismenu-icon pe-7s-settings"></i>
        Cài đặt chung
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul class="nav nav-treeview nav-pills nav-sidebar {{ Request::is('units*')? 'mm-show' : '' }}">
        <li class="nav-item">
            <a href="{{ route('units.index') }}" class="{{ Request::is('units*') ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-cash"></i>
                Đơn vị tính
            </a>

        </li>


    </ul>
</li>


