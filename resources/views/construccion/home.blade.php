<!DOCTYPE html>
<!--[if IE 7 ]> <html class="ie ie7"> <![endif]-->
<!--[if IE 8 ]> <html class="ie ie8"> <![endif]-->
<!--[if IE 9 ]> <html class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" lang="es"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

    <title>{{ $conf->titulo }}</title>

    <meta name="keywords" content="{{ $conf->keywords }}"/>
    <meta name="description" content="{{ $conf->descripcion }}"/>
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index, follow">

    {{-- GOOGLE FONT --}}
    {!! HTML::style('http://fonts.googleapis.com/css?family=Signika:400,700,300') !!}

    {{-- Bootstrap - Font Awesome --}}
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}

    {{-- CSS LIBRARY --}}
    {!! HTML::style('css/lib/owl.carousel.css') !!}

    {{-- AWE FONT --}}
    {!! HTML::style('css/awe-fonts.css') !!}

    {{-- PAGE STYLE --}}
    {!! HTML::style('css/style.css') !!}
    {!! HTML::style('css/responsive.css') !!}

    <!--[if lt IE 9]>
        {!! HTML::script('http://html5shim.googlecode.com/svn/trunk/html5.js') !!}
        {!! HTML::script('http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js') !!}
    <![endif]-->

    @yield('script_header')
    
</head>
<body id="construccion" class="home">

{{-- PRELOADER --}}
<div class="preloader">
    <div class="inner">
        <div class="item item1"></div>
        <div class="item item2"></div>
        <div class="item item3"></div>
    </div>
</div>
{{-- END / PRELOADER --}}

{{-- PAGE WRAP --}}
<div id="page-wrap">
    
    {{-- HEADER --}}
    <header id="header" class="header header-1">
        <div class="container">
            {{-- LOGO --}}
            
            <div class="logo"><a href="/"><img {{ (Request::is('/') ? 'src=images/logo-texto.png' : 'src=images/logo.png') }} alt="Chiwake - Comida Peruana"></a></div>
            {{-- END / LOGO --}}

            {{-- OPEN MENU MOBILE --}}
            <div class="open-menu-mobile">
                <span>Activar menú de móvil</span>
            </div>
            {{-- END / OPEN MENU MOBILE --}}

            {{-- NAVIGATION --}}
            <nav class="navigation text-right" data-menu-type="1200">
                {{-- NAV --}}
                <ul class="nav text-uppercase">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Reservación</a></li>
                    <li><a href="#">Contactenos</a></li>
                </ul>
                {{-- END / NAV --}}
                
                {{-- SOCIAL --}}
                <div class="head-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>                    
                </div>
                {{-- END / SOCIAL --}}
            </nav>
            {{-- END / NAVIGATION --}}
        </div>

    </header>
    {{-- END / HEADER --}}

<!-- HOME MEDIA -->
<section id="home-media" class="home-media section">
    <div class="home-fullscreen tb">
        <div class="awe-parallax bg-1"></div>

        <div class="awe-overlay overlay-default"></div>

        <div class="tb-cell text-center">
            <div class="home-content">
                <div class="ribbon ribbon-1">
                    <h2 class="sm">MUY PRONTO</h2>
                </div>
                <h1 style="margin-top: 10px;" class="sbig text-uppercase"><img src="images/logo-big.png" alt=""></h1>
            </div>
        </div>
    </div>
</section>
<!-- END / HOME MEDIA -->

<!-- CONTACT US -->
<section id="contact" class="contact section">

    <div class="contact-first">

        <!-- OVERLAY -->
        <div class="awe-overlay overlay-default"></div>
        <!-- END / OVERLAY -->
        
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="contact-body text-center">
                            <h3 class="lg text-uppercase">CONTÁCTENOS</h3>
                            <hr class="_hr">
                            <address class="address-wrap">
                                <span class="address">Av. Caminos del Inca 1533 - Surco</span>
                            </address>
                        </div>

                        <div class="see-map text-center">
                            <a href="#" data-see-contact="Ver contacto" data-see-map="Ver locación en mapa" class="awe-btn awe-btn-5 awe-btn-default text-uppercase"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MAP -->
        <div id="map" data-map-zoom="14" data-map-latlng="-12.125480, -76.983148" data-snazzy-map-theme="grayscale" data-map-marker="images/marker.png" data-map-marker-size="200*60"></div>
        <!-- END / MAP -->
    </div>

</section>

<!-- END / CONTACT US -->

{{-- FOOTER --}}
    <footer id="footer" class="footer">
        <div class="divider divider-1 divider-color"></div>
        <div class="awe-color"></div>
        <div class="container">
            <div class="copyright text-center">
                © 2015 Chiwake
            </div>
        </div>
    </footer>
    {{-- END / FOOTER --}}

</div>
{{-- END / PAGE WRAP --}}

{{-- jQuery - Bootstrap --}}
{!! HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}
{!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') !!}

{{-- GOOGLE MAP --}}
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript" src="js/lib/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.owl.carousel.min.js"></script>
<script type="text/javascript" src="js/lib/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="js/lib/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="js/lib/retina.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>

{{ $conf->google_analytics }}

</body>
</html>