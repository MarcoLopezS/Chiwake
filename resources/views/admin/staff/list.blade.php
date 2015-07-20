@extends('layouts.admin')

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
{!! HTML::style('admin/vendors/datatables/css/dataTables.colReorder.min.css') !!}
{!! HTML::style('admin/vendors/datatables/css/dataTables.scroller.min.css') !!}
{!! HTML::style('admin/vendors/datatables/css/dataTables.bootstrap.css') !!}
{!! HTML::style('admin/css/pages/tables.css') !!}
{!! HTML::style('admin/vendors/Buttons-master/css/buttons.css') !!}
<!--end of page level css-->
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <!--section starts-->
    <h1>Staff</h1>
    <a href="{{ route('administrador.staff.create') }}" class="btn btn-md btn-default">
        <span class="glyphicon glyphicon-plus"></span>
        Agregar nuevo registro
    </a>

    <a href="{{ route('administrador.staff.order') }}" class="btn btn-md btn-default">
        <span class="glyphicon glyphicon-move"></span>
        Ordenar
    </a>

    <div class="alert alert-dismissable"></div>

    @if(Session::has('mensaje'))
        <div class="alert alert-success">
            {{ Session::get('mensaje') }}
        </div>
    @endif
</section>
<!--section ends-->
<section class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-body">

                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Publicar</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $item)
                            <tr data-id="{{ $item->id }}" data-title="{{ $item->titulo }}">
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->cargo }}</td>
                                <td>{{ $item->publicar ? 'Publicado' : 'No publicado' }}</td>
                                <td>
                                    <div class="button-dropdown" data-buttons="dropdown">
                                        <a href="#" class="button button-rounded">
                                            Acciones
                                            <i class="fa fa-caret-down"></i>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('administrador.staff.edit', $item->id) }}">Editar</a></li>
                                            <li><a href="#" class="btn-delete">Eliminar</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row">

                        <div class="col-md-5 col-sm-12">
                            <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">Total de registros: {{ $posts->total() }}</div>
                        </div>

                        <div class="col-md-7 col-sm-12">
                            <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">
                                {!! $posts->appends(Request::all())->render() !!}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<div id="dialog-confirm" title="Eliminar registro">
    <p>¿Desea eliminar el registro?</p>
    <div class="title"></div>
</div>

{!! Form::open(['route' => ['administrador.staff.destroy', ':REGISTER'], 'method' => 'DELETE', 'id' => 'FormDeleteRow']) !!}
{!! Form::close() !!}
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
{!! HTML::script('admin/vendors/Buttons-master/js/vendor/scrollto.js') !!}
{!! HTML::script('admin/vendors/Buttons-master/js/main.js') !!}
{!! HTML::script('admin/vendors/Buttons-master/js/buttons.js') !!}

<script>
$(document).on("ready", function(){
    $('.alert-dismissable').hide();
    $("#dialog-confirm").hide();

    $(".btn-delete").on("click", function(){
        var row = $(this).parents("tr");
        var id = row.data("id");
        var title = row.data("title");
        var form = $("#FormDeleteRow");
        var url = form.attr("action").replace(':REGISTER', id);
        var data = form.serialize();

        $("#dialog-confirm .title").text(title);

        $( "#dialog-confirm" ).dialog({
            resizable: true,
            height: 250,
            modal: false,
            buttons: {
                "Borrar registro": function() {
                    row.fadeOut();

                    $.post(url, data, function(result){
                        $(".alert").show().removeClass('alert-danger').addClass('alert-success').text(result.message);
                    }).fail(function(){
                        $(".alert").show().removeClass('alert-success').addClass('alert-danger').text("Se produjo un error al eliminar el registro");
                        row.show();
                    });

                    $(this).dialog("close");
                },
                Cancel: function() {
                    $(this).dialog("close");
                }
            }
        });
    });
});

</script>
@stop