

<li class="nav-item">
    <a href="{{ route('organizations.index') }}"
       class="nav-link {{ Request::is('backend/organizations*') ? 'active' : '' }}">
        <table style="width: -webkit-fill-available;">
            <tr>
                <td width="20%" style="text-align: center"><i class="fas fa-balance-scale-right"></i></td>
                <td width="75%" style="text-align: left"><p>Organizations</p></td>
            </tr>
        </table>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('ceos.index') }}"
       class="nav-link {{ Request::is('backend/ceos*') ? 'active' : '' }}">
        <table style="width: -webkit-fill-available;">
            <tr>
                <td width="20%" style="text-align: center"><i class="fas fa-balance-scale-right"></i></td>
                <td width="75%" style="text-align: left"><p>Ceos</p></td>
            </tr>
        </table>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('industries.index') }}"
       class="nav-link {{ Request::is('backend/industries*') ? 'active' : '' }}">
        <table style="width: -webkit-fill-available;">
            <tr>
                <td width="20%" style="text-align: center"><i class="fas fa-balance-scale-right"></i></td>
                <td width="75%" style="text-align: left"><p>Industries</p></td>
            </tr>
        </table>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('products.index') }}"
       class="nav-link {{ Request::is('backend/products*') ? 'active' : '' }}">
        <table style="width: -webkit-fill-available;">
            <tr>
                <td width="20%" style="text-align: center"><i class="fas fa-balance-scale-right"></i></td>
                <td width="75%" style="text-align: left"><p>Products</p></td>
            </tr>
        </table>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('profiles.index') }}"
       class="nav-link {{ Request::is('backend/profiles*') ? 'active' : '' }}">
        <table style="width: -webkit-fill-available;">
            <tr>
                <td width="20%" style="text-align: center"><i class="fas fa-balance-scale-right"></i></td>
                <td width="75%" style="text-align: left"><p>Profiles</p></td>
            </tr>
        </table>
    </a>
</li>


