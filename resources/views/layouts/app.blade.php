<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Control Servidor</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/css.css')}}">

    <!-- Styles-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/datatable/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.stepy.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/highlight.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/docs.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-reset.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/estilos.css')}}">

    <!--file upload-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-fileupload.min.css')}}"/>
    <!--ios7-->
    <link rel="stylesheet" href="{{asset('assets/js/ios-switch/switchery.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/gritter/css/jquery.gritter.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/css/select.dataTables.min.css')}}"/>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body id="app-layout">

<nav class="navbar navbar-default">
    <div class="container-fluid" style="height: 64px;">
        <div class="col-md-10 col-md-offset-1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/home') }}" style="padding: 10px 15px;">
                    <img src="{{asset('assets/images/logo.png')}}" alt="sorzana">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/auditservidor') }}">Audit Servidor <span class="sr-only">(current)</span></a></li>
                    <li><a href="{{ url('/csi') }}">CSI Toyota <span class="sr-only">(current)</span></a></li>
                    <li><a href="{{ url('/dbbackup') }}">DbBackup <span class="sr-only">(current)</span></a></li>
                    <li><a href="{{ url('/conces') }}">Listado de Empresas <span class="sr-only">(current)</span></a></li>
                    {{--<li><a href="{{ url('/actualiza_empresa') }}">Actualizar Empresas <span class="sr-only">(current)</span></a></li>--}}
                </ul>
            </div>
        </div>


    </div>
</nav>



@yield('content')

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-filestyle.min.js')}}"></script>
<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/highlight.js')}}"></script>

<script src="{{asset('assets/js/ios-switch/switchery.js')}}" ></script>
<script src="{{asset('assets/js/ios-switch/ios-init.js')}}" ></script>

<script src="{{asset('assets/js/gritter/js/jquery.gritter.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/gritter/js/gritter-init.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/dataTables.select.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/conceconexion.js')}}" type="text/javascript"></script>

@yield('scripts')
</body>
</html>
