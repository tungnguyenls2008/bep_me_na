<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <?php
        $connection=\Illuminate\Support\Facades\Session::get('connection');
        ?>
        <img src="{{asset($connection['logo'])}}"
             alt="{{asset($connection['logo']) }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ \Illuminate\Support\Facades\Session::get('connection')['name'] }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="true">
                <a href="{{ route('home') }}">
                    <img src="{{asset($connection['logo'])}}"
                     alt="{{asset($connection['logo'])}} Logo"
                                                  class="brand-image img-circle elevation-3" width="220px"></a>

                <hr>
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
