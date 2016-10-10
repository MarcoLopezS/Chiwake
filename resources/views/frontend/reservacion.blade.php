@extends('layouts.frontend')

@section('titulo')
    Reservación | @parent
@endsection

@section('script_header')
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

            <iframe src="https://www.atrapalo.pe/restaurantes/marca_blanca/47702" width="650" height="600" frameborder="0" scrolling="no"></iframe>

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
@stop