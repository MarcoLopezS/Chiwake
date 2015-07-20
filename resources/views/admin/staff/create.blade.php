@extends('layouts.admin')

{{-- page level styles --}}
@section('header_styles')
{!! HTML::style('admin/css/pages/form_layouts.css') !!}
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <!--section starts-->
    <h1>
        Agregar nuevo registro
    </h1>
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
                    {!! Form::open(['route' => 'administrador.staff.store', 'method' => 'POST', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) !!}

                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('cargo', 'Cargo', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('cargo', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3',
                                'onkeydown' => 'limitText(this.form.descripcion,this.form.countdown,220);',
                                'onkeyup' => 'limitText(this.form.descripcion,this.form.countdown,220);']) !!}
                                <span class="help-block">Caracteres permitidos:
                                    <strong>
                                        <input name="countdown" type="text" style="border:none; background:none;" value="220" size="3" readonly id="countdown">
                                    </strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('imagen', 'Imagen', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::file('imagen') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('publicar', 'Publicar', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                <label class="checkbox-inline">
                                    {!! Form::radio('publicar', '1', null,  ['id' => 'publicar']) !!}
                                    Si
                                </label>
                                <label class="checkbox-inline">
                                    {!! Form::radio('publicar', '0', null,  ['id' => 'publicar']) !!}
                                    No
                                </label>
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-responsive btn-primary btn-md']) !!}
                                <a href="{{ route('administrador.staff.index') }}" class="btn btn-responsive btn-default btn-md">Cancelar</a>
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