<div class="app-sidebar sidebar-shadow" @if(checkIfMobile()==false) data-aos="fade-right" @endif>

    <div class="scrollbar-sidebar scrollbar-style ps ps--active-y" style="overflow: auto!important;">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu metismenu" id="metismenu">
                <a href="{{ route('home') }}">
                    <?php
                    if (file_exists(realpath('img/organization_logos/'.Session::get('connection')['db_name'].'.png'))){
                        $src=(asset('img/organization_logos/'.(Session::get('connection')['db_name']).'.png')); // put your path and image here
                    }
                    else{
                        $src=(asset('img/organization_logos/default-company-logo.png')); // put your path and image here
                    }
                    ?>
                    <img src="{{$src}}"
                         alt="{{$src}} Logo"
                         class="brand-image img-circle elevation-3" width="220px"></a>

                <hr>
                @include('layouts.menu')

            </ul>
        </div>
    </div>
</div>
