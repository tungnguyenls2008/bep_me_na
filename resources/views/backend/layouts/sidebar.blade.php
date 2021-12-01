<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ route('backend-home') }}" class="brand-link">
        <img src="{{asset('img/overlord.png')}}"
             alt="{{ config('app.backend-name') }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.backend-name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="true">
                <a href="{{ route('backend-home') }}">
                    <img src="{{asset('img/overlord.png')}}"
                     alt="{{ config('app.backend-name') }} Logo"
                                                  class="brand-image img-circle elevation-3" width="220px"></a>

                <hr>
                @include('backend.layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
