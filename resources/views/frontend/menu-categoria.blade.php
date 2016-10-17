@extends('layouts.frontend')

@section('titulo')
    {{ $menuCategoria->titulo }} | @parent
@endsection

@section('contenido_frontend')

<!-- SUB BANNER -->
<section class="sub-banner text-center section sub-banner-corporativo">
    <div class="awe-parallax bg-4" style="background:url('{{ $menuCategoria->imagen_menu }}');"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">{{ $menuCategoria->titulo }}</h3>
    </div>
</section>
<!-- END / SUB BANNER -->

<!-- THE MENU -->
<section class="section-blog section">
    <div class="container">

        <div class="row">

            <div class="col-md-9">
                <div class="blog-list">

                    @foreach($menus as $item_menu)
                    <div class="post post-single">
                        <div class="post-body">
                            <div class="post-title">
                                <h3 class="xmd"><a href="{{ $item_menu->url }}">{{ $item_menu->titulo }}</a></h3>
                            </div>
                            <div class="post-content">
                                <p>{{ $item_menu->descripcion }}</p>
                            </div>
                            @if($item_menu->precio != 0)
                            <div class="post-footer">
                                <a class="awe-btn awe-btn-2 awe-btn-default text-uppercase">S/ {{ number_format($item_menu->precio, 2, '.', ',') }}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="col-md-3">

                <aside id="reserva-lateral" class="we-are-hiring wow fadeInUp" data-wow-delay=".3s">
                    <div class="awe-color"></div>
                    <div class="tb">
                        <div class="hiring-title">
                            <h4 class="sm text-uppercase">¿Buscas una mesa?</h4>
                        </div>

                        <div class="hiring-body">
                            <p>Vive con nosotros una nueva experiencia en comida. Somos personas que engríen personas.</p>
                        </div>

                        <div class="hiring-link">
                            <a href="{{ route('front.reservacion') }}" class="awe-btn awe-btn-1 awe-btn-default text-uppercase">RESERVA</a>
                        </div>
                    </div>
                </aside>

            </div>

        </div>

    </div>
</section>
<!-- END / THE MENU -->

@stop

@section('script_footer')
    {{-- Sticky --}}
    {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.3/jquery.sticky.min.js') !!}
    <script>
        $(document).ready(function(){
            $("#reserva-lateral").sticky({topSpacing:0});
        });
    </script>
@endsection