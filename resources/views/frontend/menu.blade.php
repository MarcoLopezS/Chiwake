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

            <div class="carta-lista">
                @foreach($menuCategoria as $categoria)
                    <div class="awe-btn awe-btn-3 awe-btn-default text-uppercase">
                        <a href="{{ $categoria->url }}" title="{{ $categoria->titulo }}">
                            {{ $categoria->titulo }}
                        </a>
                    </div>
                @endforeach
            </div>

            <img class="carta-imagen" src="/imagenes/carta.jpg" alt="Chiwake - La Carta">

        </div>

    </div>

</section>
<!-- END / THE MENU -->

@stop