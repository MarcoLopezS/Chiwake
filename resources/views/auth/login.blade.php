<!DOCTYPE html>
<html>
<head>
    <title>Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    {!! HTML::style('admin/css/bootstrap.min.css') !!}
    <!-- end of global level css -->
    <!-- page level css -->
    {!! HTML::style('admin/css/pages/login2.css') !!}
    <!-- styles of the page ends-->
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class=" col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Iniciar sesión</h3>
                    </div>
                    <div class="panel-body">

                        {!! Form::open(['method' => 'post', 'role' => 'form' ]) !!}

                              <div class="form-group">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                              </div>

                              <div class="form-group">
                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                              </div>

                              <div class="checkbox">
                                    <label>
                                    	{!! Form::checkbox('remember-me', 'Remember Me', null) !!}
                                    	Recordarme
                                    </label>
                              </div>

                              <input type="submit" value="Login" class="btn btn-primary btn-block btn-lg" />

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    {!! HTML::script('admin/js/jquery-1.11.1.min.js') !!}
    {!! HTML::script('admin/js/bootstrap.min.js') !!}
    <!-- end of global js -->
    <!-- begining of page level js-->
    {!! HTML::script('admin/js/TweenLite.min.js') !!}
    <script type="text/javascript">
    $(document).ready(function() {
        $(document).mousemove(function(event) {
            TweenLite.to($('body'),
                .5, {
                    css: {
                        backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px"
                    }
                });
        });
    });
    </script>
</body>
</html>