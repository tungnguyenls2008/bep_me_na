

<li class="nav-item">
    <a href="{{ route('menus.index') }}"
       class="nav-link {{ Request::is('menus*') ? 'active' : '' }}">
        <p>Menus</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('rawMaterialImports.index') }}"
       class="nav-link {{ Request::is('rawMaterialImports*') ? 'active' : '' }}">
        <p>Raw Material Imports</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('checkoutOrders.index') }}"
       class="nav-link {{ Request::is('checkoutOrders*') ? 'active' : '' }}">
        <p>Checkout Orders</p>
    </a>
</li>


