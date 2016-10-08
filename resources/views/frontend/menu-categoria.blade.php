@extends('layouts.frontend')

@section('titulo')
    {{ $menuCategoria->titulo }} | @parent
@endsection

@section('contenido_frontend')

<!-- SUB BANNER -->
<section class="sub-banner text-center section">
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

            <div class="col-md-12">
                <div class="blog-list">

                    @foreach($menus as $item_menu)
                    <div class="post post-single">
                        <div class="post-media">
                            <div class="image-wrap">
                                <img src="{{ $item_menu->imagen_menu_thumb }}" alt="">
                            </div>
                        </div>
                        <div class="post-body">
                            <div class="post-title">
                                <h3 class="xmd"><a href="{{ $item_menu->url }}">{{ $item_menu->titulo }}</a></h3>
                            </div>
                            <div class="post-content">
                                <p>{{ $item_menu->descripcion }}</p>
                            </div>
                            <div class="post-footer">
                                <a class="awe-btn awe-btn-2 awe-btn-default text-uppercase">S/ {{ number_format($item_menu->precio, 2, '.', ',') }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>

    </div>
</section>
<!-- END / THE MENU -->

@stop