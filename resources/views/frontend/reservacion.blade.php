@extends('layouts.frontend')

@section('script_header')

    {{-- SMARTFORM --}}
    <link rel="stylesheet" type="text/css"  href="libs/smartform/css/smart-forms.css">
    <link rel="stylesheet" type="text/css"  href="libs/smartform/css/smart-addons.css">
    <link rel="stylesheet" type="text/css"  href="libs/smartform/css/font-awesome.min.css">
@stop


@section('contenido_frontend')

    {{-- SUB BANNER --}}
    <section class="sub-banner text-center section">
        <div class="awe-parallax bg-4"></div>
        <div class="awe-title awe-title-3">
            <h3 class="lg text-uppercase">Reservación</h3>
        </div>
    </section>
    {{-- END / SUB BANNER --}}

    {{-- RESERVATION --}}
    <section class="reservation section pd">
        <div class="divider divider-2"></div>
        <div class="reservation-content">

            <div class="smart-forms smart-container">

                {!! Form::open(['route' => 'front.reservacion.form', 'method' => 'POST', 'id' => 'formReserva', 'class' => 'pageContacto pageReserva']) !!}

                    <div class="form-body">

                        <div class="frm-row">
                            
                            <div class="section colm colm6">
                                <label for="nombre" class="field-label">Nombre</label>
                                <label for="nombre" class="field prepend-icon">
                                    {!! Form::text('nombre', null, ['class' => 'gui-input', 'placeholder' => 'Nombre...']) !!}
                                    <label for="nombre" class="field-icon"><i class="fa fa-user"></i></label>
                                </label>
                            </div>

                            <div class="section colm colm6">
                                <label for="apellidos" class="field-label">Apellidos</label>
                                <label for="apellidos" class="field prepend-icon">
                                    {!! Form::text('apellidos', null, ['class' => 'gui-input', 'placeholder' => 'Apellidos...']) !!}
                                    <label for="apellidos" class="field-icon"><i class="fa fa-user"></i></label>
                                </label>
                            </div>

                        </div>

                        <div class="frm-row">
                            
                            <div class="section colm colm6">
                                <label for="email" class="field-label">Email</label>
                                <label for="email" class="field prepend-icon">
                                    {!! Form::email('email', null, ['class' => 'gui-input', 'placeholder' => 'Email...']) !!}
                                    <label for="email" class="field-icon"><i class="fa fa-envelope"></i></label>
                                </label>
                            </div>

                            <div class="section colm colm6">
                                <label for="telefono" class="field-label">Teléfono</label>
                                <label for="telefono" class="field prepend-icon">
                                    {!! Form::text('telefono', null, ['class' => 'gui-input', 'placeholder' => 'Teléfono...']) !!}
                                    <label for="telefono" class="field-icon"><i class="fa fa-phone"></i></label>
                                </label>
                            </div>

                        </div>
                        
                        <div class="frm-row">

                            <div class="section colm colm4">
                                <label for="fecha" class="field-label">Fecha</label>
                                <label for="fecha" class="field prepend-icon">
                                    {!! Form::text('fecha', null, ['class' => 'gui-input', 'id' => 'fecha']) !!}
                                    <label class="field-icon"><i class="fa fa-calendar"></i></label>  
                                </label>
                            </div>{{-- end section --}}

                            <div class="section colm colm4">
                                <label for="hora" class="field-label">Hora</label>
                                <label for="hora" class="field prepend-icon">
                                    {!! Form::text('hora', null, ['class' => 'gui-input', 'id' => 'hora']) !!}
                                    <label class="field-icon"><i class="fa fa-clock-o"></i></label>  
                                </label>
                            </div>{{-- end section --}}

                            <div class="section colm colm4">
                                <label for="personas" class="field-label">Personas</label>
                                <label class="field">
                                    {!! Form::text('personas', 1, ['class' => 'gui-input', 'id' => 'personas']) !!}
                                </label>
                            </div>{{-- end section --}}

                        </div>{{-- end .frm-row section --}}

                        <div class="result"></div>{{-- end .result  section --}}
                        
                    </div>{{-- end .form-body section --}}

                    <div class="form-actions text-center">
                        <a id="formReservarSubmit" href="#" class="contact-submit awe-btn awe-btn-6 awe-btn-default text-uppercase">Reservar</a>
                    </div>

                    <div class="contact-content"></div
>
                {!! Form::close() !!}

            </div>

        </div>
    </section>
    {{-- END / RESERVATION --}}

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

    {{-- SMARTFORM --}}
    <script src="libs/smartform/js/jquery-ui-1.10.4.custom.min.js"></script>

    <script src="libs/smartform/js/jquery.form.min.js"></script>
    <script src="libs/smartform/js/jquery.validate.min.js"></script>
    <script src="libs/smartform/js/additional-methods.min.js"></script>
    <script src="libs/smartform/js/jquery-ui-timepicker.min.js"></script>
    <script src="libs/smartform/js/jquery-ui-touch-punch.min.js"></script>
    <script src="libs/smartform/js/jquery.stepper.min.js"></script>

    <script>
    $(function() {

        $('#hora').timepicker({
            beforeShow: function(input, inst) {
                var newclass = 'smart-forms';
                var smartpikr = inst.dpDiv.parent();
                if (!smartpikr.hasClass('smart-forms')){
                    inst.dpDiv.wrap('<div class="'+newclass+'"></div>');
                }
            }
        });

        $("#fecha").datepicker({
            numberOfMonths: 1,
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            showButtonPanel: false
        });

        $('#personas').stepper({
            UI: false,
            allowWheel :false,
            limit: [1, 100]
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