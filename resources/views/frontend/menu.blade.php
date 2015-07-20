@extends('layouts.frontend')

@section('contenido_frontend')

<!-- SUB BANNER -->
<section class="sub-banner text-center section">
    <div class="awe-parallax bg-4"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">Menu</h3>
    </div>
</section>
<!-- END / SUB BANNER -->

<!-- THE MENU -->
<section id="the-menu" class="the-menu section">
    <div class="tabs-menu tabs-page">
        <div class="container">
            <ul class="nav-tabs text-center" role="tablist">
                @foreach($menus_categories as $item)
                <li><a href="#{{ $item->slug_url }}" role="tab" data-toggle="tab">{{ $item->titulo }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="section-content">
        <div class="container">
            <div class="tab-menu-content tab-content">

                @foreach($menus_categories as $item)
                <!-- LIST -->
                <div class="tab-pane fade" id="{{ $item->slug_url }}">

                    <div class="row">

                        @foreach($menus as $item_menu)

                            @if($item_menu->menu_category_id == $item->id)

                            <!-- THE MENU ITEM -->
                            <div class="col-lg-6">
                                <div class="the-menu-item">
                                    <div class="image-wrap">
                                        <img src="/upload/{{ $item_menu->imagen_carpeta."60x60/".$item_menu->imagen }}" alt="">
                                    </div>
                                    <div class="the-menu-body">
                                        <h4 class="xsm">{{ $item_menu->titulo }}</h4>
                                        <p>{{ $item_menu->descripcion }}</p>
                                    </div>
                                    <div class="prices">
                                        <span class="price xsm">S/. {{ $item_menu->precio }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END / THE MENU ITEM -->

                            @endif

                        @endforeach

                    </div>
                    
                </div>
                <!-- END LIST -->
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- END / THE MENU -->

@stop