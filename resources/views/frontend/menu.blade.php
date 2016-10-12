@extends('layouts.frontend')

@section('titulo')
    La Carta | @parent
@endsection

@section('contenido_frontend')

<!-- SUB BANNER -->
<section id="carta-titulo" class="sub-banner text-center section">
    <div class="awe-parallax bg-4"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">La Carta</h3>
    </div>
    <div id="carta-subtitulo" class="relative text-center">
        <div class="awe-title awe-title-1">
            <p class="lg text-uppercase">Somos especialistas en pescado y mariscos. Seleccionamos los mejores insumos para mantener la calidad de nuestros platos.</p>
        </div>
    </div>
</section>
<!-- END / SUB BANNER -->

<!-- THE MENU -->
<section id="section-blog" class="section-blog section">

    <div class="container">
        <div class="row">
            <div class="blog-grid">
                <div class="grid-sizer"></div>

                @foreach($menuCategoria as $categoria)
                <div class="post post-single">
                    <div class="post-media">
                        <a href="{{ $categoria->url }}" title="{{ $categoria->titulo }}">
                            <img src="{{ $categoria->imagen_menu_thumb }}" alt="{{ $categoria->titulo }}">
                        </a>
                    </div>
                    <div class="post-body">
                        <div class="post-title">
                            <h2 class="text-uppercase">
                                <a href="{{ $categoria->url }}" title="{{ $categoria->titulo }}">
                                    {{ $categoria->titulo }}
                                </a>
                            </h2>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>

</section>
<!-- END / THE MENU -->

@stop