@extends('layouts.admin')

{{-- page level styles --}}
@section('header_styles')
{!! HTML::style('admin/css/pages/tables.css') !!}
{!! HTML::style('admin/vendors/Buttons-master/css/buttons.css') !!}
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <h1>Usuarios</h1>
    <a href="{{ route('administrador.users.create') }}" class="btn btn-md btn-default">
        <span class="glyphicon glyphicon-plus"></span>
        Agregar nuevo usuario
    </a>

    <div class="alert alert-dismissable"></div>

    @if(Session::has('mensaje'))
        <div class="alert alert-success">
            {{ Session::get('mensaje') }}
        </div>
    @endif
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-body">

                <table class="table table-striped table-responsive">
                    <thead>
                        <tr class="filters">
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    	<tr>
                    		<td>{{{ $user->first_name }}}</td>
            				<td>{{{ $user->last_name }}}</td>
            				<td>{{{ $user->email }}}</td>
            				<td>
                                <div class="button-dropdown" data-buttons="dropdown">
                                    <a href="#" class="button button-rounded">
                                        Acciones
                                        <i class="fa fa-caret-down"></i>
                                    </a>
                                    <ul>
                                        <li><a href="{{ route('administrador.users.edit', $user->id) }}">Editar</a></li>
                                        <li><a href="{{ route('administrador.users.destroy', $user->id) }}">Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
            			</tr>
                    @endforeach
                        
                    </tbody>
                </table>

                <div class="row">

                    <div class="col-md-5 col-sm-12">
                        <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">Total de registros: {{ $users->total() }}</div>
                    </div>

                    <div class="col-md-7 col-sm-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate">
                            {!! $users->appends(Request::all())->render() !!}
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>    <!-- row-->
</section>
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