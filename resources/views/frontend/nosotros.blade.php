@extends('layouts.frontend')

@section('contenido_frontend')

<!-- SUB BANNER -->
<section class="sub-banner text-center section">
    <div class="awe-parallax bg-5"></div>
    <div class="awe-title awe-title-3">
        <h3 class="lg text-uppercase">Nosotros</h3>
    </div>
</section>
<!-- END / SUB BANNER -->

<!-- ABOUT STORY -->
<section id="about-story" class="about-story section">
    <div class="divider divider-2"></div>
    <div class="container">
        <div class="block-first">
            <div class="row">
                <div class="col-md-8">
                    <div class="image-wrap">
                        {{--*/
                        $about_imagen = "/upload/".$about->about_imagen_carpeta."750x300/".$about->about_imagen;
                        /*--}}
                        <img src="{{ $about_imagen }}" alt="QUIENES SOMOS">
                    </div>
                </div>

                <div class="col-md-4">
                    <h4 class="lg text-uppercase">QUIENES SOMOS</h4>
                    {!! $about->about !!}
                </div>
            </div>
        </div>

        <div class="block-last">
            <div class="row">
                <div class="col-md-4 col-md-push-8">
                    <div class="image-wrap">
                        {{--*/
                        $misvis_imagen = "/upload/".$about->misvis_imagen_carpeta."400x310/".$about->misvis_imagen;
                        /*--}}
                        <img src="{{ $misvis_imagen }}" alt="Misión y Visión">
                    </div>
                </div>

                <div class="col-md-7 col-md-pull-4">
                    <h4 class="lg text-uppercase">VISIÓN</h4>
                    {!! $about->vision !!}
                    <h4 class="lg text-uppercase">MISIÓN</h4>
                    {!! $about->mision !!}
                    <a href="#" class="awe-btn awe-btn-2 awe-btn-default text-uppercase">Ver menú</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ABOUT STORY -->

@stop