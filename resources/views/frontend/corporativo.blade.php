@extends('layouts.frontend')

@section('titulo')
    Corporativo | @parent
@endsection

@section('script_header')
    {{-- SMARTFORM --}}
    <link rel="stylesheet" type="text/css"  href="/libs/smartform/css/smart-forms.css">
    <link rel="stylesheet" type="text/css"  href="/libs/smartform/css/smart-addons.css">
    <link rel="stylesheet" type="text/css"  href="/libs/smartform/css/font-awesome.min.css">

    {{-- Royal Slider --}}
    {!! HTML::style('libs/royalslider/royalslider.css') !!}
    {!! HTML::style('libs/royalslider/skins/minimal-white/rs-minimal-white.css') !!}
@stop


@section('contenido_frontend')

    {{-- SUB BANNER --}}
    <section class="sub-banner text-center section sub-banner-corporativo">
        <div class="awe-parallax bg-corporativo"></div>
        <div class="awe-title awe-title-3">
            <h3 class="lg text-uppercase">Corporativo</h3>
        </div>
    </section>
    {{-- END / SUB BANNER --}}

    {{-- RESERVATION --}}
    <section class="reservation section pd corporativo">
        <div class="divider divider-2"></div>

        <div class="reservation-content">

            <h4 class="text-uppercase text-center">Realiza tu reserva ahora mismo</h4>

            <div class="smart-forms smart-container">

                {!! Form::open(['route' => 'front.corporativo.post', 'method' => 'POST', 'id' => 'formReserva', 'class' => 'pageContacto pageReserva']) !!}

                <div class="form-body">

                    <div class="frm-row">

                        <div class="section colm colm12">
                            <label for="empresa" class="field-label">Empresa</label>
                            <label for="empresa" class="field prepend-icon">
                                {!! Form::text('empresa', null, ['class' => 'gui-input', 'placeholder' => 'Empresa...']) !!}
                                <label for="empresa" class="field-icon"><i class="fa fa-user"></i></label>
                            </label>
                        </div>

                        <div class="section colm colm4">
                            <label for="fecha" class="field-label">Fecha</label>
                            <label for="fecha" class="field prepend-icon">
                                {!! Form::text('fecha', null, ['class' => 'gui-input', 'id' => 'fecha']) !!}
                                <label class="field-icon"><i class="fa fa-calendar"></i></label>
                            </label>
                        </div>{{-- end section --}}

                        <div class="section colm colm4">
                            <div class="spacer-b30">
                                <label for="duracion">Duración (Horas):</label>
                                {!! Form::text('duracion', null, ['class' => 'slider-input', 'id' => 'duracion']) !!}
                            </div><!-- end .spacer -->
                            <div class="slider-wrapper blue-slider">
                                <div id="duracion-slider"></div>
                            </div><!-- end .slider-wrapper -->
                        </div>{{-- end section --}}

                        <div class="section colm colm4">
                            <label for="personas" class="field-label">Personas</label>
                            <label class="field">
                                {!! Form::text('personas', 1, ['class' => 'gui-input', 'id' => 'personas']) !!}
                            </label>
                        </div>{{-- end section --}}

                    </div>

                    <div class="frm-row">

                        <div class="spacer-t20 spacer-b30">
                            <div class="tagline"><span> Tipo de Evento </span></div>
                        </div>

                        <div class="section" style="text-align: center;">
                            <div class="option-group field">
                                <label for="almuerzo" class="option">
                                    <input type="radio" name="tipo" id="almuerzo" value="almuerzo">
                                    <span class="radio"></span> Almuerzo
                                </label>

                                <label for="cena" class="option">
                                    <input type="radio" name="tipo" id="cena" value="cena">
                                    <span class="radio"></span> Cena
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="frm-row">

                        <div class="spacer-t20 spacer-b30">
                            <div class="tagline"><span> Datos de Contacto </span></div>
                        </div>

                        <div class="section colm colm4">
                            <label for="contacto" class="field-label">Nombre</label>
                            <label for="contacto" class="field prepend-icon">
                                {!! Form::text('contacto', null, ['class' => 'gui-input', 'placeholder' => 'Nombre...']) !!}
                                <label for="contacto" class="field-icon"><i class="fa fa-user"></i></label>
                            </label>
                        </div>

                        <div class="section colm colm4">
                            <label for="email" class="field-label">Email</label>
                            <label for="email" class="field prepend-icon">
                                {!! Form::email('email', null, ['class' => 'gui-input', 'placeholder' => 'Email...']) !!}
                                <label for="email" class="field-icon"><i class="fa fa-envelope"></i></label>
                            </label>
                        </div>

                        <div class="section colm colm4">
                            <label for="telefono" class="field-label">Teléfono</label>
                            <label for="telefono" class="field prepend-icon">
                                {!! Form::text('telefono', null, ['class' => 'gui-input', 'placeholder' => 'Teléfono...']) !!}
                                <label for="telefono" class="field-icon"><i class="fa fa-phone"></i></label>
                            </label>
                        </div>

                    </div>

                    <div class="result"></div>{{-- end .result  section --}}

                </div>{{-- end .form-body section --}}

                <div id="progressbar" class="form-actions text-center" style="display: none;">
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </div>

                <div class="form-actions text-center">
                    <a id="formReservarSubmit" href="javascript:;" class="contact-submit awe-btn awe-btn-6 awe-btn-default text-uppercase">Enviar</a>
                </div>

                <div class="corporativo-success" style="display: none;">
                    <div class="awe-info">
                        <p>Los datos han sido enviados con éxito.</p>
                    </div>
                </div>

                <div class="contact-content" style="display: none;"></div>

                {!! Form::close() !!}

            </div>

        </div>

        <div id="corporativo-slider">
            <h4 class="text-uppercase text-center">Contamos con diversas opciones para tus reservas corporativas, buffet criollo, menús corporativos, piqueos con cocteles, entre otros.</h4>

            <img src="/imagenes/corporativo/collage.jpg" alt="Corporativo">
        </div>
    </section>
    {{-- END / RESERVATION --}}

    {{-- DATOS DE CONTACTO --}}
    <div id="corporativo-contacto" class="contact-second tb">
        <!-- NEWS LETTER -->
        <div class="tb-cell">
            <div class="news-letter text-center">
                <div class="inner wow fadeInUp" data-wow-delay=".6s">
                    <div class="letter-heading">
                        <p>Eventos | Teléfonos: 396-5760 | Celular: 960445861</p>
                        <p>E-mail: marketing@chiwake.pe</p>
                        <p>La cotización será enviada vía e-mail en el plazo del siguiente día util.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END / NEWS LETTER -->
    </div>

    {{-- TESTIMONIAL --}}
    <section id="testimonial" class="testimonial testimonial-1 section">
        {{-- BACKGROUND --}}
        <div class="awe-parallax bg-6"></div>
        {{-- END / BACKGROUND --}}

        {{-- OVERLAY --}}
        <div class="awe-overlay"></div>
        {{-- END / OVERLAY --}}

        <div class="container">
        
            @foreach($frases as $item)
            <div class="testimonial-content">
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
    </section>
    {{-- END / TESTIMONIAL --}}

@stop


@section('script_footer')

    {{-- Royal Slider --}}
    {!! HTML::script('libs/royalslider/jquery.royalslider.min.js') !!}
    <script>
        $(document).on("ready", function() {
            $('#full-width-slider').royalSlider({
                arrowsNav: true,
                loop: true,
                keyboardNavEnabled: true,
                controlsInside: false,
                imageScaleMode: 'fill',
                arrowsNavAutoHide: false,
                autoScaleSlider: true,
                autoScaleSliderWidth: 960,
                autoScaleSliderHeight: 350,
                controlNavigation: 'bullets',
                thumbsFitInViewport: false,
                navigateByClick: true,
                startSlideId: 0,
                autoPlay: true,
                transitionType:'move',
                globalCaption: false,
                deeplinking: {
                    enabled: true,
                    change: false
                },
                imgWidth: 1400,
                imgHeight: 800
            });
        });
    </script>

    {{-- SMARTFORM --}}
    <script src="/libs/smartform/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="/libs/smartform/js/jquery.form.min.js"></script>
    <script src="/libs/smartform/js/jquery.validate.min.js"></script>
    <script src="/libs/smartform/js/additional-methods.min.js"></script>
    <script src="/libs/smartform/js/jquery-ui-timepicker.min.js"></script>
    <script src="/libs/smartform/js/jquery-ui-slider-pips.min.js"></script>
    <script src="/libs/smartform/js/jquery-ui-touch-punch.min.js"></script>
    <script src="/libs/smartform/js/jquery.stepper.min.js"></script>

    <script>
    $(function() {

        $("#duracion-slider").slider({
            range: "max",
            min: 1,
            max: 10,
            value: 1,
            slide: function(event, ui) {
                $("#duracion").val(ui.value);
            }
        });

        $("#duracion").val( $("#duracion-slider").slider("value") );

        $("#fecha").datepicker({
            numberOfMonths: 1,
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            showButtonPanel: false
        });

        $('#personas').stepper({
            UI: false,
            allowWheel :false,
            limit: [1, 255]
        });

    });
    </script>

    <script>
    $(document).on("ready", function(){

        $("#formReservarSubmit").on("click", function(e){
            e.preventDefault();

            var form = $("#formReserva");
            var url = form.attr('action');
            var data = form.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                beforeSend: function() { $("#progressbar").show(); },
                complete: function() { $("#progressbar").hide(); },
                success: function (result) {
                    $(".contact-content").hide();
                    $(".corporativo-success").show();
                    form[0].reset();
                    $("#duracion").val(1);
                },
                error: function (result) {
                    $(".contact-content").show().text("Se produjo un error al enviar el mensaje. Intentelo de nuevo más tarde.");

                    if(result.status === 422){
                        var errors = result.responseJSON;
                        var errorsHtml = '<div class="alert alert-danger"><ul>';
                        $.each( errors, function( key, value ) {
                            errorsHtml += '<li>' + value[0] + '</li>';
                        });
                        errorsHtml += '</ul></di>';
                        $('.contact-content').html(errorsHtml);

                    };
                }
            });

        });

    });
</script>

@stop