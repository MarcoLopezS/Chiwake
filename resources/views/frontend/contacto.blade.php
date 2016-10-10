@extends('layouts.frontend')

@section('titulo')
    Contacto | @parent
@endsection

@section('contenido_frontend')

<!-- SUB BANNER -->
<section class="sub-banner text-center section">
    <div class="awe-parallax bg-3"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">Contactenos</h3>
    </div>
</section>
<!-- END / SUB BANNER -->

<!-- CONTACT US -->
<section id="contact" class="contact section">

    <div class="contact-form contact-form-2">
        <div class="divider divider-2"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <address class="find-us">
                        <span class="md">Encuentranos aquí</span>
                        <div class="location-1">
                            <i class="icon awe_map_marker"></i>
                            <strong>Av. Caminos del Inca 1533 - Santiago de Surco</strong>
                        </div>

                        <div class="phone">
                            <strong>Teléfono</strong>
                            396-5760 / 960445861
                        </div>
                    </address>
                </div>
                <div class="col-md-8">
                    <div class="form-row">

                        {!! Form::open(['route' => 'front.contacto.form', 'method' => 'POST', 'id' => 'formContacto', 'class' => 'pageContacto']) !!}

                        	<div class="form-item form-textarea">
                        	    {!! Form::textarea('mensaje', null, ['placeholder' => 'Tu mensaje']) !!}
                            </div>
                            <div class="form-item form-type-name">
                                {!! Form::text('nombre', null, ['placeholder' => 'Tu nombre']) !!}
                            </div>
                            <div class="form-item form-type-email">
                                {!! Form::text('email', null, ['placeholder' => 'Tu email']) !!}
                            </div>
                            <div class="form-actions text-center">
                                <a id="formContactoSubmit" href="#" class="contact-submit awe-btn awe-btn-6 awe-btn-default text-uppercase">Enviar mensaje</a>
                            </div>
                            <div class="contact-content"></div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

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
                $(".contact-content").text(result.message);
                form[0].reset();
            }).fail(function(result){
                console.log(result);
                $(".contact-content").text("Se produjo un error al enviar el mensaje. Intentelo de nuevo más tarde.");

                if(result.status === 422){

                    var errors = result.responseJSON;

                    errorsHtml = '<div class="alert alert-danger"><ul>';
                    $.each( errors, function( key, value ) {
                        errorsHtml += '<li>' + value[0] + '</li>';
                    });
                    errorsHtml += '</ul></di>';

                    //$('.mensaje').show();
                    $('.contact-content').html(errorsHtml);

                };

            });

        });

    });
</script>

@stop