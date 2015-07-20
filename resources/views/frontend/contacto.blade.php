@extends('layouts.frontend')

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
                            <strong>Av. Arequipa 915</strong>
                        </div>

                        <div class="phone">
                            <strong>Teléfono</strong>
                            (511) 3792 - 7384 - 8459
                        </div>
                    </address>
                </div>
                <div class="col-md-8">
                    <div class="form-row">

                        {!! Form::open(['route' => 'front.contacto.form', 'method' => 'post', 'id' => 'send-message-form']) !!}

                        	<div class="form-item form-textarea">
                        	    {!! Form::textarea('mensaje', null, ['placeholder' => 'Tu mensaje']) !!}
                            </div>
                            <div class="form-item form-type-name">
                                {!! Form::text('nombre', null, ['placeholder' => 'Tu nombre']) !!}
                            </div>
                            <div class="form-item form-type-email">
                                {!! Form::text('email', null, ['placeholder' => 'Tu email']) !!}
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Enviar" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">
                            </div>
                            <div id="contacto-content">{{ $mensaje }}</div>

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
                                <span class="address">Av. Arequipa 915</span>
                                <span class="phone">3792 - 7384 - 8459</span>
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
        <div id="map" data-map-zoom="14" data-map-latlng="-12.073780, -77.036211" data-snazzy-map-theme="grayscale" data-map-marker="images/marker.png" data-map-marker-size="200*60"></div>
        <!-- END / MAP -->
    </div>

</section>

<!-- END / CONTACT US -->

@stop