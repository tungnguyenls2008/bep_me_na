<?php
$connection = \Illuminate\Support\Facades\Session::get('connection');

?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $connection['name'] }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
          rel="stylesheet">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css"
          integrity="sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ=="
          crossorigin="anonymous"/>

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
          integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
          crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous"/>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
          integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/metismenu/dist/metisMenu.min.css">
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">

{{--=========================FONT==================================--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans&display=swap" rel="stylesheet">
{{--    ======================END FONT===========================--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="https://use.fontawesome.com/e57c0d7c9a.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"
            integrity="sha512-++c7zGcm18AhH83pOIETVReg0dr1Yn8XTRw+0bWSIWAVCAwz1s2PwnSj4z/OOyKlwSXc4RLg3nnjR22q0dhEyA=="
            crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"
            integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg=="
            crossorigin="anonymous"></script>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
        integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg=="
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
            integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
            crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"
            integrity="sha512-J+763o/bd3r9iW+gFEqTaeyi+uAphmzkE/zU8FxY6iAvD3nQKXa+ZAWkBI9QS9QkYEKddQoiy0I5GDxKf/ORBA=="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/metismenu"></script>
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>
<style>
    body {
        color: #2d3748;
    }
    body {
        margin: 0;
        font-family: 'Encode Sans', sans-serif;
        /*font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";*/
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        background-color: #fff;
    }
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 38px;
        user-select: none;
        -webkit-user-select: none;
    }

    .app-header__logo .logo-src {
        height: 50px;
        width: 50px;
        text-align: center;
        vertical-align: middle;
        {{--background: url({{$connection['logo']!=''?asset($connection['logo']):asset('img/organization_logos/default-company-logo.png')}});--}}
    }

    .app-header__logo .company-name {
        height: 50px;
        width: auto;
        display: contents;

    }
    .border {
        border: 8px solid #ffffff!important;
        box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23)!important;
    }
</style>
<body class="">
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow" @if(checkIfMobile()==false) data-aos="fade-down" @endif>
        <div class="app-header__logo">
            <a href="{{route('home')}}" style="display: contents;color: #2d3748">
{{--            <div class="logo-src">--}}
                <?php
                if (file_exists(realpath('img/organization_logos/'.Session::get('connection')['db_name'].'.png'))){
                    $src=(asset('img/organization_logos/'.(Session::get('connection')['db_name']).'.png')); // put your path and image here
                }
                else{
                    $src=(asset('img/organization_logos/default-company-logo.png')); // put your path and image here
                }
                ?>
{{--                <img--}}
{{--                    src="{{$src}}"--}}
{{--                    alt="logo" width="42px">--}}
{{--            </div>--}}
            <div class="logo-src company-name">
                <p><h4>{{$connection['name']}}</h4></p>
            </div>
            </a>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>
        <div class="app-header__content">
            <div class="app-header-left">
                <div class="search-wrapper">
                    <div class="input-holder">
                        <input type="text" class="search-input" placeholder="Gõ từ khóa cần tìm">
                        <button class="search-icon"><span></span></button>
                    </div>
                    <button class="close"></button>
                </div>
                <ul class="header-menu nav">
                    <li class="nav-item">
                        <a href="{{route('menus.create')}}" class="nav-link">
                            <i class="nav-link-icon fa fa-database"> </i>
                            Thêm sản phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('checkoutOrders.create')}}" class="nav-link">
                            <i class="nav-link-icon fa fa-plus"> </i>
                            Tạo doanh thu
                        </a>
                    </li>
                    <li class="btn-group nav-item">
                        <a href="{{route('expending.create')}}" class="nav-link">
                            <i class="nav-link-icon fa fa-plus-circle"></i>
                            Tạo chi phí
                        </a>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="{{route('employees.index')}}" class="nav-link">
                            <i class="nav-link-icon fa fa-users"></i>
                            Quản trị nhân sự
                        </a>
                    </li>
                </ul>
            </div>
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <div style="margin: auto">
                                        <?php
                                        $connection=\Illuminate\Support\Facades\Session::get('connection');
                                        $organization=\App\Models\Models_be\Organization::withoutTrashed()->where(['db_name'=>$connection['db_name']])->first();
                                        ?>
                                        @if($organization->status==0)
                                            <span class="badge badge-pill badge-warning" style="color: white">Dùng thử</span>
                                        @elseif($organization->status==1)
                                            <span class="badge badge-success" style="color: white">Chính thức</span>
                                        @endif
                                    </div>
                                    <a id="top-right-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                       class="p-0 btn ">
                                        <img width="42" class="rounded-circle"
                                             src="{{$connection['logo']!=''?asset($connection['logo']):asset('img/organization_logos/default-company-logo.png')}}"
                                             alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                         class="dropdown-menu dropdown-menu-right">
                                        <button type="button" tabindex="0" class="dropdown-item">Tài khoản</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Cài đặt</button>
{{--                                        <h6 tabindex="-1" class="dropdown-header">Header</h6>--}}
{{--                                        <button type="button" tabindex="0" class="dropdown-item">Actions</button>--}}
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Đăng xuất
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="widget-subheading">
                                    @if( Auth::user()->is_ceo==1)
                                        CEO
                                        @elseif(Auth::user()->is_ceo==0)
                                        Thành viên
                                        @endif
                                </div>
                            </div>
                            <div class="widget-content-right header-user-info ml-3">
                                <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                    <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="ui-theme-settings">--}}
{{--        <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">--}}
{{--            <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>--}}
{{--        </button>--}}
{{--        <div class="theme-settings__inner">--}}
{{--            <div class="scrollbar-container">--}}
{{--                <div class="theme-settings__options-wrapper">--}}
{{--                    <h3 class="themeoptions-heading">Layout Options--}}
{{--                    </h3>--}}
{{--                    <div class="p-3">--}}
{{--                        <ul class="list-group">--}}
{{--                            <li class="list-group-item">--}}
{{--                                <div class="widget-content p-0">--}}
{{--                                    <div class="widget-content-wrapper">--}}
{{--                                        <div class="widget-content-left mr-3">--}}
{{--                                            <div class="switch has-switch switch-container-class"--}}
{{--                                                 data-class="fixed-header">--}}
{{--                                                <div class="switch-animate switch-on">--}}
{{--                                                    <input type="checkbox" checked data-toggle="toggle"--}}
{{--                                                           data-onstyle="success">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="widget-content-left">--}}
{{--                                            <div class="widget-heading">Fixed Header--}}
{{--                                            </div>--}}
{{--                                            <div class="widget-subheading">Makes the header top fixed, always visible!--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item">--}}
{{--                                <div class="widget-content p-0">--}}
{{--                                    <div class="widget-content-wrapper">--}}
{{--                                        <div class="widget-content-left mr-3">--}}
{{--                                            <div class="switch has-switch switch-container-class"--}}
{{--                                                 data-class="fixed-sidebar">--}}
{{--                                                <div class="switch-animate switch-on">--}}
{{--                                                    <input type="checkbox" checked data-toggle="toggle"--}}
{{--                                                           data-onstyle="success">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="widget-content-left">--}}
{{--                                            <div class="widget-heading">Fixed Sidebar--}}
{{--                                            </div>--}}
{{--                                            <div class="widget-subheading">Makes the sidebar left fixed, always visible!--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item">--}}
{{--                                <div class="widget-content p-0">--}}
{{--                                    <div class="widget-content-wrapper">--}}
{{--                                        <div class="widget-content-left mr-3">--}}
{{--                                            <div class="switch has-switch switch-container-class"--}}
{{--                                                 data-class="fixed-footer">--}}
{{--                                                <div class="switch-animate switch-off">--}}
{{--                                                    <input type="checkbox" data-toggle="toggle" data-onstyle="success">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="widget-content-left">--}}
{{--                                            <div class="widget-heading">Fixed Footer--}}
{{--                                            </div>--}}
{{--                                            <div class="widget-subheading">Makes the app footer bottom fixed, always--}}
{{--                                                visible!--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <h3 class="themeoptions-heading">--}}
{{--                        <div>--}}
{{--                            Header Options--}}
{{--                        </div>--}}
{{--                        <button type="button"--}}
{{--                                class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class"--}}
{{--                                data-class="">--}}
{{--                            Restore Default--}}
{{--                        </button>--}}
{{--                    </h3>--}}
{{--                    <div class="p-3">--}}
{{--                        <ul class="list-group">--}}
{{--                            <li class="list-group-item">--}}
{{--                                <h5 class="pb-2">Choose Color Scheme--}}
{{--                                </h5>--}}
{{--                                <div class="theme-settings-swatches">--}}
{{--                                    <div class="swatch-holder bg-primary switch-header-cs-class"--}}
{{--                                         data-class="bg-primary header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-secondary switch-header-cs-class"--}}
{{--                                         data-class="bg-secondary header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-success switch-header-cs-class"--}}
{{--                                         data-class="bg-success header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-info switch-header-cs-class"--}}
{{--                                         data-class="bg-info header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-warning switch-header-cs-class"--}}
{{--                                         data-class="bg-warning header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-danger switch-header-cs-class"--}}
{{--                                         data-class="bg-danger header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-light switch-header-cs-class"--}}
{{--                                         data-class="bg-light header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-dark switch-header-cs-class"--}}
{{--                                         data-class="bg-dark header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-focus switch-header-cs-class"--}}
{{--                                         data-class="bg-focus header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-alternate switch-header-cs-class"--}}
{{--                                         data-class="bg-alternate header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="divider">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-vicious-stance switch-header-cs-class"--}}
{{--                                         data-class="bg-vicious-stance header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-midnight-bloom switch-header-cs-class"--}}
{{--                                         data-class="bg-midnight-bloom header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-night-sky switch-header-cs-class"--}}
{{--                                         data-class="bg-night-sky header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-slick-carbon switch-header-cs-class"--}}
{{--                                         data-class="bg-slick-carbon header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-asteroid switch-header-cs-class"--}}
{{--                                         data-class="bg-asteroid header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-royal switch-header-cs-class"--}}
{{--                                         data-class="bg-royal header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-warm-flame switch-header-cs-class"--}}
{{--                                         data-class="bg-warm-flame header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-night-fade switch-header-cs-class"--}}
{{--                                         data-class="bg-night-fade header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-sunny-morning switch-header-cs-class"--}}
{{--                                         data-class="bg-sunny-morning header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-tempting-azure switch-header-cs-class"--}}
{{--                                         data-class="bg-tempting-azure header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-amy-crisp switch-header-cs-class"--}}
{{--                                         data-class="bg-amy-crisp header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-heavy-rain switch-header-cs-class"--}}
{{--                                         data-class="bg-heavy-rain header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-mean-fruit switch-header-cs-class"--}}
{{--                                         data-class="bg-mean-fruit header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-malibu-beach switch-header-cs-class"--}}
{{--                                         data-class="bg-malibu-beach header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-deep-blue switch-header-cs-class"--}}
{{--                                         data-class="bg-deep-blue header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-ripe-malin switch-header-cs-class"--}}
{{--                                         data-class="bg-ripe-malin header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-arielle-smile switch-header-cs-class"--}}
{{--                                         data-class="bg-arielle-smile header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-plum-plate switch-header-cs-class"--}}
{{--                                         data-class="bg-plum-plate header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-happy-fisher switch-header-cs-class"--}}
{{--                                         data-class="bg-happy-fisher header-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-happy-itmeo switch-header-cs-class"--}}
{{--                                         data-class="bg-happy-itmeo header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-mixed-hopes switch-header-cs-class"--}}
{{--                                         data-class="bg-mixed-hopes header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-strong-bliss switch-header-cs-class"--}}
{{--                                         data-class="bg-strong-bliss header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-grow-early switch-header-cs-class"--}}
{{--                                         data-class="bg-grow-early header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-love-kiss switch-header-cs-class"--}}
{{--                                         data-class="bg-love-kiss header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-premium-dark switch-header-cs-class"--}}
{{--                                         data-class="bg-premium-dark header-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-happy-green switch-header-cs-class"--}}
{{--                                         data-class="bg-happy-green header-text-light">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <h3 class="themeoptions-heading">--}}
{{--                        <div>Sidebar Options</div>--}}
{{--                        <button type="button"--}}
{{--                                class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class"--}}
{{--                                data-class="">--}}
{{--                            Restore Default--}}
{{--                        </button>--}}
{{--                    </h3>--}}
{{--                    <div class="p-3">--}}
{{--                        <ul class="list-group">--}}
{{--                            <li class="list-group-item">--}}
{{--                                <h5 class="pb-2">Choose Color Scheme--}}
{{--                                </h5>--}}
{{--                                <div class="theme-settings-swatches">--}}
{{--                                    <div class="swatch-holder bg-primary switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-primary sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-secondary switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-secondary sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-success switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-success sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-info switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-info sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-warning switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-warning sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-danger switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-danger sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-light switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-light sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-dark switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-dark sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-focus switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-focus sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-alternate switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-alternate sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="divider">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-vicious-stance sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-midnight-bloom sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-night-sky switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-night-sky sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-slick-carbon sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-asteroid switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-asteroid sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-royal switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-royal sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-warm-flame sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-night-fade switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-night-fade sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-sunny-morning sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-tempting-azure sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-amy-crisp sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-heavy-rain sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-mean-fruit sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-malibu-beach sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-deep-blue sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-ripe-malin sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-arielle-smile sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-plum-plate sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-happy-fisher sidebar-text-dark">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-happy-itmeo sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-mixed-hopes sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-strong-bliss sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-grow-early switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-grow-early sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-love-kiss sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-premium-dark sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                    <div class="swatch-holder bg-happy-green switch-sidebar-cs-class"--}}
{{--                                         data-class="bg-happy-green sidebar-text-light">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <h3 class="themeoptions-heading">--}}
{{--                        <div>Main Content Options</div>--}}
{{--                        <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">--}}
{{--                            Restore Default--}}
{{--                        </button>--}}
{{--                    </h3>--}}
{{--                    <div class="p-3">--}}
{{--                        <ul class="list-group">--}}
{{--                            <li class="list-group-item">--}}
{{--                                <h5 class="pb-2">Page Section Tabs--}}
{{--                                </h5>--}}
{{--                                <div class="theme-settings-swatches">--}}
{{--                                    <div role="group" class="mt-2 btn-group">--}}
{{--                                        <button type="button"--}}
{{--                                                class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class"--}}
{{--                                                data-class="body-tabs-line">--}}
{{--                                            Line--}}
{{--                                        </button>--}}
{{--                                        <button type="button"--}}
{{--                                                class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class"--}}
{{--                                                data-class="body-tabs-shadow">--}}
{{--                                            Shadow--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="app-main">

        <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
        <div class="app-main__outer">
            <div class="app-main__inner">

{{--                <div class="" data-aos="fade-in" data-aos-delay="300">--}}
                <div >
                    @yield('content')
                </div>
            </div>


            <!-- Main Footer -->
            <footer class="app-wrapper-footer">
                <div class="app-footer">
                    <div class="app-footer__inner">
{{--                        <div class="app-footer-left">--}}
{{--                            <ul class="nav">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="javascript:void(0);" class="nav-link">--}}
{{--                                        Footer Link 1--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="javascript:void(0);" class="nav-link">--}}
{{--                                        Footer Link 2--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <div class="app-footer-right">
                            <ul class="nav">
{{--                                <li class="nav-item">--}}
{{--                                    <a href="javascript:void(0);" class="nav-link">--}}
{{--                                        Footer Link 3--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li class="nav-item">
                                    <a href="mailto:tungnguyenls2008@gmail.com" class="nav-link">

                                        All rights reserved @ THUCHI
                                        <div class="badge badge-success mr-1 ml-0">
                                            <small>{{date('Y',time())}}</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>


<script>


    $(function () {
        AOS.init();
        bsCustomFileInput.init();
        $("#top-right-menu").on('click',function () {
            $(this).attr('aria-expanded','true')
        })
    });

    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    $('select').select2({
        width: '100%',
        placeholder: 'Chọn...',
        allowClear: true
    });
</script>

@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>
