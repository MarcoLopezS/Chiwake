<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administrador</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!--[if lt IE 9]>
    {!! HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') !!}
    {!! HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') !!}
    <![endif]-->
    
    {{-- BOOTSTRAP --}}
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') !!}

    {{-- FONTAWESOME --}}
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}

    {{-- ESTILOS --}}
    {!! HTML::style('admin/css/styles/black.css') !!}
    {!! HTML::style('admin/css/panel.css') !!}
    {!! HTML::style('admin/css/metisMenu.css') !!}

    {{-- jQuery UI --}}
    {!! HTML::style('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css') !!}
    
    @yield('header_styles')

</head>

<body class="skin-josh">
    <header class="header">
        <a href="{{ route('administrador.index') }}" class="logo">
            <img src="{{ asset('admin/img/logo.png') }}" alt="logo">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="riot">
                                <div>
                                    {{ Auth::user()->first_name." ".Auth::user()->last_name }}
                                    <span><i class="caret"></i></span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <p class="topprofiletext">{{ Auth::user()->first_name." ".Auth::user()->last_name }}</p>
                            </li>
                            <!-- Menu Body -->
                            <li><a href="{{ route('administrador.users.profile') }}"><i class="livicon" data-name="user" data-s="18"></i>Mi perfil</a></li>
                            <li><a href="{{ url('auth/logout') }}"><i class="livicon" data-name="sign-out" data-s="18"></i> Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar purplebg">
                <div class="page-sidebar  sidebar-nav">

                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li {!! (Request::is('administrador') ? 'class="active"' : '') !!}>
                            <a href="{{ route('administrador.index') }}">
                                <span class="title">Dashboard</span>
                            </a>
                        </li>

                        <li {!! (Request::is('administrador/about*') || Request::is('administrador/staff*') ? 'class="active"' : '') !!}>
                            <a href="#">
                                <span class="title">Nosotros</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('administrador/about/nosotros') ? 'class="active"' : '') !!}>
                                    <a href="{{ route('administrador.about.nosotros') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Quienes Somos
                                    </a>
                                </li>
                                <li {!! (Request::is('administrador/about/misvis') ? 'class="active"' : '') !!}>
                                    <a href="{{ route('administrador.about.misvis') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Misión y Visión
                                    </a>
                                </li>
                                <li {!! (Request::is('administrador/staff*') ? 'class="active"' : '') !!}>
                                    <a href="{{ route('administrador.staff.index') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Staff
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li {!! (Request::is('administrador/menus*') ? 'class="active"' : '') !!}>
                            <a href="{{ route('administrador.menus_categories.index') }}">
                                <span class="title">Menús</span>
                            </a>
                        </li>

                        <li {!! (Request::is('administrador/phrases*') ? 'class="active"' : '') !!}>
                            <a href="{{ route('administrador.phrases.index') }}">
                                <span class="title">Frases</span>
                            </a>
                        </li>

                        <li {!! (Request::is('administrador/config*') ? 'class="active"' : '') !!}>
                            <a href="{{ route('administrador.config.edit') }}">
                                <span class="title">Configuración</span>
                            </a>
                        </li>

                        <li {!! ( Request::is('administrador/users*') || Request::is('administrador/profile*') ? 'class="active"' : '') !!}>
                            <a href="#">
                                <span class="title">Usuarios</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('administrador/users') ? 'class="active"' : '') !!}>
                                    <a href="{{ route('administrador.users.index') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Todos los usuarios
                                    </a>
                                </li>
                                <li {!! (Request::is('administrador/users/create') ? 'class="active"' : '') !!}>
                                    <a href="{{ route('administrador.users.create') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Nuevo usuario
                                    </a>
                                </li>
                                <li {!! (Request::is('administrador/profile*') ? 'class="active"' : '') !!}>
                                    <a href="{{ route('administrador.users.profile') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Mi Perfil
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
        </aside>
        <aside class="right-side">

            <!-- Content -->
            @yield('content_admin')

        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>

    {{-- jQuery y jQuery UI --}}
    {!! HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}
    {!! HTML::script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js') !!}

    {{-- BOOTSTRAP --}}
    {!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js') !!}

    {{-- SCRIPTS --}}
    {!! HTML::script('admin/vendors/livicons/minified/raphael-min.js') !!}
    {!! HTML::script('admin/vendors/livicons/minified/livicons-1.4.min.js') !!}
    {!! HTML::script('admin/js/josh.js') !!}
    {!! HTML::script('admin/js/metisMenu.js') !!}

    @yield('footer_scripts')

</body>
</html>