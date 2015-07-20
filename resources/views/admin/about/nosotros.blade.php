@extends('layouts.admin')

{{-- page level styles --}}
@section('header_styles')
{!! HTML::style('admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css') !!}
{!! HTML::style('admin/css/pages/form_layouts.css') !!}
{!! HTML::style('admin/vendors/gallery/basic/source/jquery.fancybox.css?v=2.1.5') !!}
@stop


{{-- Page content --}}
@section('content_admin')
<section class="content-header">
	<!--section starts-->
	<h1>Quienes somos</h1>

    @if(Session::has('mensaje'))
        <div class="alert alert-success">
            {{ Session::get('mensaje') }}
        </div>
    @endif
</section>
<!--section ends-->
<section class="content">
	<!--main content-->
	<div class="row">
        
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

		<!--row starts-->
		<div class="col-lg-12">

			<!--basic form starts-->
			<div class="panel panel-danger">
				<div class="panel-body border">
					{!! Form::model($post, ['route' => 'administrador.about.nosotrosUpdate', 'method' => 'PUT', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) !!}

                        <div class="form-group">
                            {!! Form::label('titulo', 'Titulo', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                Quienes Somos
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('contenido', 'Contenido', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('contenido', $post->about, ['id' => 'ckeditor_full', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('imagen_actual', 'Imagen actual', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                <a class="fancybox" href="/upload/{{ $post->about_imagen_carpeta."".$post->about_imagen }}" title="{{ $post->titulo }}">
                                    <img src="/upload/{{ $post->about_imagen_carpeta }}200x100/{{ $post->about_imagen }}" alt="" />
                                </a>
                                {!! Form::hidden('imagen_actual', $post->about_imagen) !!}
                                {!! Form::hidden('imagen_actual_carpeta', $post->about_imagen_carpeta) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('imagen', 'Imagen', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::file('imagen') !!}
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                {!! Form::submit('Guardar cambios', ['class' => 'btn btn-responsive btn-primary btn-md']) !!}
                            </div>
                        </div>

					{!! Form::close() !!}
				</div>
			</div>

		</div>
		<!--md-6 ends-->

	</div>
	<!--main content ends-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
{!! HTML::script('admin/vendors/jasny-bootstrap/js/jasny-bootstrap.js') !!}

{{-- CKEDITOR --}}
{!! HTML::script('admin/vendors/ckeditor/ckeditor.js') !!}
{!! HTML::script('admin/vendors/ckeditor/adapters/jquery.js') !!}
{!! HTML::script('admin/js/pages/editor.js') !!}

{{-- FANCYBOX --}}
{!! HTML::script('admin/vendors/gallery/basic/source/jquery.fancybox.pack.js?v=2.1.5') !!}
{!! HTML::script('admin/vendors/gallery/basic/lib/jquery.mousewheel.pack.js?v=3.1.3') !!}
<script type="text/javascript">
$(document).ready(function() {
    $(".fancybox").fancybox({
        helpers: {
            title: {
                type: 'outside'
            },
            overlay: {
                speedOut: 0
            }
        }
    });
});
</script>
@stop