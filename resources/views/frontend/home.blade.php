@extends('layouts.frontend')

@section('contenido_frontend')

<!-- HOME MEDIA -->
<section id="home-media" class="home-media section">
    <div class="home-fullscreen tb">
        <div class="awe-parallax bg-1"></div>

        <div class="awe-overlay overlay-default"></div>

        <div class="tb-cell text-center">
            <div class="home-content">
                <div class="ribbon ribbon-1">
                    <h2 class="sm">BIENVENIDO A</h2>
                </div>
                <h1 style="margin-top: 10px;" class="sbig text-uppercase"><img src="images/logo-big.png" alt=""></h1>
            </div>
        </div>
    </div>
</section>
<!-- END / HOME MEDIA -->

<!-- GOOD FOOD -->
<section id="good-food" class="good-food section pd">
    <div class="container">
        <div class="good-food-heading text-center">
            <div class="good-food-title style-2">
                <i class="icon awe_quote_left"></i>
                <h2 class="lg text-capitalize">Chiwake</h2>
                <i class="icon awe_quote_right"></i>
            </div>
            {!! $about->about !!}
            <a href="nosotros" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">Nosotros</a>
        </div>
    </div>

    <div class="divider divider-2"></div>
</section>
<!-- END / GOOD FOOD -->

<!-- TESTIMONIAL -->
<section id="testimonial" class="testimonial testimonial-1 section">
    <!-- BACKGROUND -->
    <div class="awe-parallax bg-2"></div>
    <!-- END / BACKGROUND -->

    <!-- OVERLAY -->
    <div class="awe-overlay"></div>
    <!-- END / OVERLAY -->

    <div class="container">
        <div class="testimonial-content testimonial-slider">

            @foreach($frases as $item)
            <div class="item">
                <div class="icon-head">
                    <i class="icon awe_quote_left"></i>
                </div>

                <blockquote>
                    <p>{{ $item->titulo }}</p>
                    <span>{{ $item->descripcion }}</span>
                    <div class="test-footer text-right">
                        <span class="sm">{{ $item->autor }}</span>
                    </div>
                </blockquote>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- END / TESTIMONIAL -->

<!-- FASTFOOD -->
<section id="fastfood" class="fastfood section pd70">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="fastfood-description">
                    <div class="content-heading mt">
                        <h4 class="lg text-uppercase">UN AMBIENTE ÚNICO</h4>
                        <hr class="_hr">
                    </div>
                    <div class="text-wrap">
                        <p>Nunca olvidará nuestra sonrisa y el trato profesional que les brindamos y los platos calientes como los cocinaba la abuela. Un servicio personalizado preparado para disfrutar en grande la cocina peruana. Un ambiente único para disfrutar con amigos, familiares y para tus encuentros de trabajo.</p>
                    </div>
                    <div class="awe-btn awe-btn-2 awe-btn-ar text-uppercase">
                        <a href="/" class="font12">Ver menú</a>
                    </div>                    
                </div>  
            </div>
            <div class="col-md-6 col-md-offset-1">
                <div class="fastfood-items">
                    <div class="row">
                        <!-- FASTFOOD ITEM -->
                        <div class="col-xs-6">
                            <div class="fastfood-item">
                                <img src="/upload/home/1.jpg" alt="">
                            </div>
                        </div>
                        <!-- END / FASTFOOD ITEM -->

                        <!-- FASTFOOD ITEM -->
                        <div class="col-xs-6">
                            <div class="fastfood-item">
                                <img src="/upload/home/2.jpg" alt="">
                            </div>
                        </div>
                        <!-- END / FASTFOOD ITEM -->

                        <!-- FASTFOOD ITEM -->
                        <div class="col-xs-6">
                            <div class="fastfood-item">
                                <img src="/upload/home/3.jpg" alt="">
                            </div>
                        </div>
                        <!-- END / FASTFOOD ITEM -->

                        <!-- FASTFOOD ITEM -->
                        <div class="col-xs-6">
                            <div class="fastfood-item">
                                <img src="/upload/home/4.jpg" alt="">
                            </div>
                        </div>
                        <!-- END / FASTFOOD ITEM -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / FASTFOOD -->

<!-- SECTION HIGHLIGHT -->
<section class="section-highlight section">
    <div class="divider divider-2 divider-color"></div>
    <div class="awe-color"></div>
    <div class="container">
        <div class="highlight-content tb">
            <div>
                <p>¿Por qué no encontrar una mesa y guardarla ahora?</p>
            </div>
            <div class="links">
                <div class="reservation-link">
                    <a href="reservacion" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">RESERVACIÓN</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / SECTION HIGHLIGHT -->

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
                                <span class="address">Av. Caminos del Inca 1533 - Santiago de Surco</span>
                                <span class="phone">396-5760 / 960445861</span>
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
        <div id="map" data-map-zoom="14" data-map-latlng="-12.125456, -76.982736" data-snazzy-map-theme="grayscale" data-map-marker="images/marker.png" data-map-marker-size="200*60"></div>
        <!-- END / MAP -->
    </div>

    <div class="contact-second tb">
        <!-- CONTACT FORM -->
        <div class="tb-cell">
            <div class="contact-form contact-form-1">
                <div class="inner wow fadeInUp" data-wow-delay=".3s">
                    {!! Form::open(['route' => 'front.contacto.form', 'method' => 'POST', 'id' => 'formContacto']) !!}
                        
                        <div class="form-item form-textarea">
                            {!! Form::textarea('mensaje', null, ['placeholder' => 'Mensaje']) !!}
                        </div>
                        <div class="form-item form-type-name">
                            {!! Form::text('nombre', null, ['placeholder' => 'Nombre']) !!}
                        </div>
                        <div class="form-item form-type-email">
                            {!! Form::text('email', null, ['placeholder' => 'Email']) !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-actions text-center">
                            <a id="formContactoSubmit" href="#" class="contact-submit awe-btn awe-btn-6 awe-btn-default text-uppercase">Enviar mensaje</a>
                        </div>
                        <div class="contact-content" id="mensaje-contacto"></div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- END / CONTACT FORM -->
    
        <!-- NEWS LETTER -->
        <div class="tb-cell">
            <div class="news-letter text-center">
                <div class="inner wow fadeInUp" data-wow-delay=".6s">
                    <div class="letter-heading">
                        <h4 class="sm text-uppercase">RECIBE NOTICIAS DE NOSOTROS</h4>
                        <p></p>
                    </div>
                    {!! Form::open(['route' => 'front.suscripcion.form', 'method' => 'POST', 'id' => 'formSuscripcion', 'class' => 'pageContacto']) !!}
                        <div class="form-item">
                            {!! Form::text('email', null, ['placeholder' => 'Email']) !!}
                        </div>
                        <div class="form-actions">
                            <a id="formSuscripcionSubmit" href="#" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">Suscribete</a>
                        </div>
                        <div class="contact-content" id="mensaje-suscripcion"></div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- END / NEWS LETTER -->
    </div>

</section>

<!-- END / CONTACT US -->

@stop

@section('script_footer')

<script>
    $(document).on("ready", function(){

        $("#formContactoSubmit").on("click", function(e){

            e.preventDefault();

            var form = $("#formContacto");
            var url = form.attr('action');
            var data = form.serialize();

            $.post(url, data, function(result){
                $("#mensaje-contacto").text(result.message);
                form[0].reset();
            }).fail(function(result){
                console.log(result);
                $("#mensaje-contacto").text("Se produjo un error al enviar el mensaje. Intentelo de nuevo más tarde.");

                if(result.status === 422){

                    var errors = result.responseJSON;

                    errorsHtml = '<div class="alert alert-danger"><ul>';
                    $.each( errors, function( key, value ) {
                        errorsHtml += '<li>' + value[0] + '</li>';
                    });
                    errorsHtml += '</ul></di>';

                    //$('.mensaje').show();
                    $('#mensaje-contacto').html(errorsHtml);

                };

            });

        });

        $("#formSuscripcionSubmit").on("click", function(e){

            e.preventDefault();

            var form = $("#formSuscripcion");
            var url = form.attr('action');
            var data = form.serialize();

            $.post(url, data, function(result){
                $("#mensaje-suscripcion").text(result.message);
                form[0].reset();
            }).fail(function(result){
                console.log(result);
                $("#mensaje-suscripcion").text("Se produjo un error al enviar el mensaje. Intentelo de nuevo más tarde.");

                if(result.status === 422){

                    var errors = result.responseJSON;

                    errorsHtml = '<div class="alert alert-danger"><ul>';
                    $.each( errors, function( key, value ) {
                        errorsHtml += '<li>' + value[0] + '</li>';
                    });
                    errorsHtml += '</ul></di>';

                    //$('.mensaje').show();
                    $('#mensaje-suscripcion').html(errorsHtml);

                };

            });

        });

    });
</script>

@stop