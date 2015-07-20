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
    <h1>Categorías</h1>
    <a href="{{ route('administrador.menus_categories.create') }}" class="btn btn-md btn-default">
        <span class="glyphicon glyphicon-plus"></span>
        Agregar nuevo registro
    </a>

    <a href="{{ route('administrador.menus_categories.order') }}" class="btn btn-md btn-default">
        <span class="glyphicon glyphicon-move"></span>
        Ordenar
    </a>
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
                                <th>Titulo</th>
                                <th>Menú</th>
                                <th>Publicar</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $item)
                            <tr>
                                <td>{{ $item->titulo }}</td>
                                <td><a href="{{ route('administrador.menus.index', $item->id) }}">Ver</a></td>
                                <td>{{ $item->publicar ? 'Publicado' : 'No publicado' }}</td>
                                <td>
                                    <div class="button-dropdown" data-buttons="dropdown">
                                        <a href="#" class="button button-rounded">
                                            Acciones
                                            <i class="fa fa-caret-down"></i>
                                        </a>
                                        <ul>
                                            <li><a href="{{ route('administrador.menus_categories.edit', $item->id) }}">Editar</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
{!! HTML::script('admin/vendors/datatables/jquery.dataTables.min.js') !!}
{!! HTML::script('admin/vendors/datatables/dataTables.tableTools.min.js') !!}
{!! HTML::script('admin/vendors/datatables/dataTables.colReorder.min.js') !!}
{!! HTML::script('admin/vendors/datatables/dataTables.scroller.min.js') !!}
{!! HTML::script('admin/vendors/datatables/dataTables.bootstrap.js') !!}
{!! HTML::script('admin/js/pages/table-advanced.js') !!}
{!! HTML::script('admin/vendors/Buttons-master/js/vendor/scrollto.js') !!}
{!! HTML::script('admin/vendors/Buttons-master/js/main.js') !!}
{!! HTML::script('admin/vendors/Buttons-master/js/buttons.js') !!}
@stop