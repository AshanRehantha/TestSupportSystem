<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="keywords" content="Booking, Calender, Make Booking, Laravel" />
    <meta name="author" content="Xtreme Webs" />
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <!-- Styles -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    <link href="{{ asset('plugins/pace-master/themes/blue/pace-theme-flash.css') }}" rel="stylesheet"/>
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/line-icons/simple-line-icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/waves/waves.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/datatables/css/jquery.datatables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/datatables/css/jquery.datatables_themeroller.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('plugins/summernote-master/summernote.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/backend.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/themes/green.css') }}" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css"/>
    @yield('styles')
    @toastr_css

</head>
@yield('template')
<body class="page-header-fixed">
<div class="overlay"></div>
<main class="page-content content-wrap">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="logo-box" style="background-color: {{ config('settings.primary_color') }}">
                <a href="{{ route('home') }}" class="logo-text"><span style="font-size:{{ config('settings.logo_font_size') }}px;">{{strtoupper(str_limit(config('settings.business_name'),15))}}</span></a>
            </div><!-- Logo Box -->
            <div class="topmenu-outer">
                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                        </li>
                        <li>
                            <a href="">
                                <i class="icon-calendar text-primary"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="icon-users text-info"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="icon-settings text-danger"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                <span class="user-name">{{ Auth::user()->name }}<i class="fa fa-angle-down"></i></span>
                                <img class="img-circle avatar" src="{{ Auth::user()->photo ? asset(Auth::user()->photo->file) : asset('images/profile-placeholder.png') }}" width="40" height="40"
                                     alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">
                            </a>
                            <ul class="dropdown-menu dropdown-list" role="menu">
                                <li role="presentation"><a href=""><i class="icon-user"></i>{{ __('backend.my_profile') }}</a></li>
                                <li role="presentation"><a href=""><i class="icon-lock"></i>{{ __('backend.change_password') }}</a></li>
                                <li role="presentation"><a href="{{ route('logout') }}" onclick="
                                event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                        <i class="icon-logout m-r-xs"></i>{{ __('backend.logout') }}
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               class="log-out waves-effect waves-button waves-classic"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <span><i class="icon-logout m-r-xs"></i>{{ __('backend.logout') }}</span>
                            </a>
                        </li>
                    </ul><!-- Nav -->
                </div><!-- Top Menu -->
            </div>
        </div>
    </div><!-- Navbar -->
    <div class="page-sidebar sidebar">
        <div class="page-sidebar-inner slimscroll">
            <div class="sidebar-header">
                <br>
                <p class="text-center">
                    <img class="img-circle avatar" src="{{ Auth::user()->photo ? asset(Auth::user()->photo->file) : asset('images/profile-placeholder.png') }}" width="60" height="60"
                         alt="{{ Auth::user()->name }}">
                </p>
                <br>
                <div class="sidebar-profile">
                    <a href=">
                        <div class="sidebar-profile-details">
                            <span>Welcome!<br>{{ Auth::user()->name }}<br><small></small></span>
                        </div>
                    </a>
                </div>
            </div>
            <ul class="menu accordion-menu">
                <li class="{{ Request::is('home') ? 'active' : '' }}">
                    <a href="{{ route('home')}}" class="waves-effect waves-button">
                        <span class="menu-icon icon-home"></span>
                        <p>{{ __('backend.Ticket_page') }}</p>
                    </a>
                </li>
                {{-- <li class="{{ Request::is('repair') || Request::is('repair/*') ? 'active' : '' }}">
                    <a href="{{ route('repair.index')}}" class="waves-effect waves-button">
                        <span class="menu-icon icon-list"></span>
                        <p>{{ __('backend.create_repair') }}</p>
                    </a>
                </li> --}}
            </ul>
        </div><!-- Page Sidebar Inner -->
    </div><!-- Page Sidebar -->
    <div class="page-inner">
    @yield('content')
    <!-- Main Wrapper -->
        <div class="page-footer">
            <p class="no-s">
                {{ __('Copyrights') }}. &copy; {{ date('Y') }}. {{ __('Rights Reserved') }} {{ config('settings.company_name', 'Test Company') }}.
            </p>
        </div>
    </div><!-- Page Inner -->
</main><!-- Page Content -->
<div class="cd-overlay"></div>
@jquery
@toastr_js
@toastr_render
<!-- Javascripts -->
<script src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/pace-master/pace.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('plugins/waves/waves.min.js') }}"></script>
<script src="{{ asset('js/backend.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/js/jquery.datatables.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('plugins/summernote-master/summernote.min.js') }}"></script>
<script src="{{ asset('js/pages/form-elements.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#xtreme-table').dataTable( {
            "order": [[ 0, "desc" ]],
            "language": {
                @if(app()->getLocale() == "en")
                    "url": "{{ asset('plugins/datatables/lang/en.json') }}"
                @elseif(app()->getLocale() == "es")
                    "url": "{{ asset('plugins/datatables/lang/es.json') }}"
                @elseif(app()->getLocale() == "fr")
                    "url": "{{ asset('plugins/datatables/lang/fr.json') }}"
                @elseif(app()->getLocale() == "de")
                    "url": "{{ asset('plugins/datatables/lang/de.json') }}"
                @elseif(app()->getLocale() == "da")
                    "url": "{{ asset('plugins/datatables/lang/da.json') }}"
                @elseif(app()->getLocale() == "it")
                    "url": "{{ asset('plugins/datatables/lang/it.json') }}"
                @elseif(app()->getLocale() == "pt")
                    "url": "{{ asset('plugins/datatables/lang/pt.json') }}"
                @endif
            }
        });
    });
</script>
@yield('scripts')
</body>
</html>
