@extends('layouts.admin')

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <!--section starts-->
    <h1>Ordenar</h1>
    <div id="mensajeAjax" class="alert alert-dismissable">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span></span>
    </div>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary tabtop">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <div class="tab-pane active gallery-padding">
                                    <div class="col-md-12">

                                        {!! Form::open(['route' => 'administrador.menus_categories.orderForm', 'method' => 'POST', 'id' => 'FormOrder']) !!}

                                        <ul id="listPhotos" class="unstyled">

                                            @foreach($photos as $item)

                                            <li data-id="{{ $item->id }}" data-title="{{ $item->titulo }}" class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">

                                                <input type="hidden" name="listPhoto[]" value="{{ $item->id }}">

                                                <img height="100" width="100" src="http://placehold.it/100x100?text={{ $item->titulo }}" class="gallery-style" alt="Image">
                                                <p>{{ $item->titulo }}</p>

                                                <div class="slider-options">
                                                    <a class="photos-move handle" title="Mover {{ $item->nombre." ".$item->apellidos }}">
                                                        <span class="glyphicon glyphicon-move"></span>
                                                    </a>
                                                </div>

                                            </li>

                                            @endforeach

                                        </ul>

                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row-->
</section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script>
$(document).on("ready", function(){
    $('.alert').hide();
    $("#listPhotos").sortable({

        handle : '.handle',
        serialize: { key: 'listPhoto' },
        revert: true,

        stop: function(evt, ui){
            var form = $("#FormOrder");
            var url = form.attr('action');
            var data = form.serialize();
            
            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                success: function(success) {
                    $("#mensajeAjax").show().removeClass('alert-danger').addClass('alert-success').text('Los cambios se realizaron con éxito.');
                }, error: function (xhr, textStatus, thrownError) {
                    console.log(xhr);
                    $("#mensajeAjax").show().removeClass('alert-success').addClass('alert-danger').text("Se produjo un error.");
                }
            });
        }
    });
});
</script>
@stop