<div class="app-sidebar sidebar-shadow">

    <div class="scrollbar-sidebar ps ps--active-y">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu metismenu" id="metismenu">
                <a href="{{ route('home') }}">
                    <img src="{{$connection['logo']!=''?asset($connection['logo']):asset('img/organization_logos/default-company-logo.png')}}"
                         alt="{{$connection['logo']!=''?asset($connection['logo']):asset('img/organization_logos/default-company-logo.png')}} Logo"
                         class="brand-image img-circle elevation-3" width="220px"></a>

                <hr>
                @include('layouts.menu')

            </ul>
        </div>
    </div>
</div>
