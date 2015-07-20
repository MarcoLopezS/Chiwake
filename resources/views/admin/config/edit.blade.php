@extends('layouts.admin')

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
	<!--section starts-->
	<h1>Configuración</h1>

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
		<!--row starts-->
		<div class="col-lg-12">

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

			<!--basic form starts-->
			<div class="panel panel-danger">
				<div class="panel-body border">
					{!! Form::model($config, ['route' => 'administrador.config.update', 'method' => 'PUT', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) !!}

                        <div class="form-group">
                            {!! Form::label('titulo', 'Titulo', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('dominio', 'Dominio', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('dominio', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('keywords', 'Palabras Clave', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('keywords', null, ['class' => 'form-control', 'rows' => '3']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('google_analytics', 'Google Analytics', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('google_analytics', null, ['class' => 'form-control', 'rows' => '3']) !!}
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