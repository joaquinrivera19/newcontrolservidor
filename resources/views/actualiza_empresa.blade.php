@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->


        <div class="col-md-3">

            <div class="panel panel-default">

                {{--<div id="maxcampania" data-maxcampania="{{ $maxcampania }}"></div>--}}

                <header class="panel-heading" style="height: 55px; padding: 10px; line-height: 32px;">
                    Campañas

                    <button type="button"
                            class="btn btn-default" data-toggle="modal"
                            data-target="#alta_campania" style="float: right">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </button>

                </header>

                <div class="panel-body">
                    <button class="btn btn-default btn_campania" type="button" id="btn_activas" data-btn_campania="1">
                        Activas
                    </button>
                    <button class="btn btn-default btn_campania" type="button" id="btn_todas" data-btn_campania="0">
                        Todas
                    </button>

                    <div class="blog-post">
                        <ul>
                            <div id="gif_campania"></div>
                            <h4><div class="vercamp_nombre_camp" style="display: initial;"></div></h4>
                            <div id="items_campania" class="items_seleccion">

                                @foreach($campania as $camp)

                                    <li>

                                        <a class="buscar_campania" href="#" type="button" id="{{ $camp->codigo }}"
                                           data-cam_codigo="{{ $camp->codigo }}" data-cam_nombre="{{ $camp->nombre }}">
                                            <i class="fa fa-angle-right"></i> {{ $camp->nombre }} </a>

                                        <a style="float:right"; id="vercamp_{{ $camp->codigo }}" class="btn btn-default btn-xs buscar_versiones_campania"
                                           data-vercamp="{{ $camp->codigo }}" data-vercamp_nombre="{{ $camp->nombre }}">
                                            <i class="fa fa-list"></i> Ver Versiones </a>

                                        <p class="m-bot-none text-right" style="padding-top: 10px;">
                                            <span class="label label-default marg">Fecha {{ $camp->fec_limite }}</span>
                                            <span class="label label-success marg">Act: {{ $camp->actualizadas }}</span>
                                            <span class="label label-primary marg">Total: {{ $camp->total }}</span>
                                        </p>
                                    </li>

                                @endforeach
                            </div>

                        </ul>
                    </div>


                    <button class="btn btn-default btn_campania" type="button" id="btn_voler_campsis" data-btn_campania="5" style="display: none">
                        < Volver
                    </button>

                </div>


            </div>

        </div>
        <div class="col-md-9">

            {!! Form::open(array('url' => 'campcon','method' => 'post', 'class' => 'submit_form')) !!}

            <div class="panel panel-primary">
                <header class="panel-heading" style="height: 55px; padding: 10px; line-height: 32px;">
                    Listado de Empresas de Campaña:
                    <div class="nombre_campania" style="display: initial;"></div>
                </header>

                <div class="panel-body">

                    <div class="col-lg-12">

                        <div id="gif"></div>

                        <input type="hidden" class="codigo_campania" name="campcon_campania">
                        <input type="hidden" name="tipo_envio" value="1">

                        <div class="encabe" style="text-align: right; margin: 0 0 20px 0">
                            <button type="submit" class="btn btn-default" id="btn_cancelar">
                                <i class="fa fa-trash-o" style="padding-right: 6px;"></i>
                                Cancelar Campaña
                            </button>
                        </div>

                        <div class="encabe" id="mensaje_vacio" style="display: none">
                            <div class="alert alert-block alert-info fade in">
                                <strong>Ups!</strong> No se encontraron empresas en esta campaña pendientes de
                                actualizar.
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12">

                        <div class="table-responsive" id="table1">
                            <table class="table table-hover table-condensed"
                                   id="tabla_campania">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Empresa</th>
                                    <th style="text-align: center;">Marca</th>
                                    <th style="text-align: center;">Proyecto</th>
                                    <th style="text-align: center;">Versión</th>
                                    <th style="text-align: center;width: 120px;">Estado</th>
                                    {{--<th>Campania</th>--}}
                                    {{--<th></th>--}}
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            {!! Form::close() !!}

            {!! Form::open(array('url' => 'campcon','method' => 'post', 'class' => 'submit_form')) !!}

            <div class="panel panel-primary">
                <div class="panel-body">

                    <div class="col-lg-12">

                        <input type="hidden" class="codigo_campania" name="campcon_campania">
                        <input type="hidden" name="tipo_envio" value="2">

                        <div class="encabe" style="text-align: right; margin: 0 0 20px 0">
                            <button type="submit" class="btn btn-default" id="btn_actualizar">
                                <i class="fa fa-cloud-upload" style="padding-right: 6px;"></i>
                                Confirmar Campaña
                            </button>
                        </div>

                        <div class="encabe" id="mensaje_vacio2" style="display: none; margin-top: 20px">
                            <div class="alert alert-block alert-info fade in">
                                <strong>Ups!</strong> No se encontraron empresas en esta campaña pendientes de
                                actualizar.
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12">

                        <div class="table-responsive" id="table2">
                            <table class="table table-hover table-condensed"
                                   id="tabla_campania2" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Empresa</th>
                                    <th>Marca</th>
                                    <th>Proyecto</th>
                                    <th>Versión</th>
                                    {{--<th>Estado</th>--}}
                                   {{-- <th>Actualizar</th>--}}
                                </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            {!! Form::close() !!}

        </div>


        {{--- iniciar modal alta-----}}

        <div class="modal fade" id="alta_campania" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"></h4>
                    </div>
                    {!! Form::open(array('url' => 'campania','method' => 'post', 'id' => 'guardar_campania')) !!}

                    <div class="modal-body">

                        <div class="con_id">
                            {!! Form::hidden('con_id', null) !!}
                        </div>


                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('cam_nombre', 'Empresa:', ['class' => 'control-label col-md-3']) !!}
                                <div class="con_nombre col-md-8">
                                    {!! Form::text('cam_nombre', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('cam_creacion', 'Fecha Alta:', ['class' => 'control-label col-md-3']) !!}
                                <div class="con_nombre col-md-8">
                                    {!! Form::date('cam_creacion', \Carbon\Carbon::now()->toDateString(), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('cam_limite', 'Fecha Limite:', ['class' => 'control-label col-md-3']) !!}
                                <div class="con_nombre col-md-8">
                                    {!! Form::date('cam_limite',  \Carbon\Carbon::now()->addDays(30)->toDateString(), ['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('cam_proyecto', 'Proyecto:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-8">
                                    {!! Form::select('cam_proyecto', $proyecto, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('cam_marca', 'Marca:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-8">
                                    {!! Form::select('cam_marca', $marca, 98, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>


                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Sistemas:</h4>
                            </div>
                            <div class="panel-body">

                                @foreach($sistemas as $sist)

                                    <div class="row">
                                        <div class="form-group">

                                            <div class="col-lg-4">
                                                <input name="campsis[{{ $sist->sis_codigo }}]" type="checkbox"
                                                       value="1" checked style="float: right"/>
                                            </div>
                                            {!! Form::label('campsis', $sist->sis_nombre, ['class' => 'control-label col-md-4', 'style' => 'text-align: left;line-height: inherit;']) !!}
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        {{--<button type="submit" class="btn btn-primary">Guardar Cambios</button>--}}
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        {{--- fin modal alta-----}}

    </section>


@endsection
@section('scripts')

    <script src="{{asset('assets/js/campania_listado.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/submit.js')}}" type="text/javascript"></script>

    <script type="text/javascript">


        $(document).ready(function () {

            $("#mensaje_vacio").hide();
            $("#mensaje_vacio2").hide();

            $("#btn_voler_campsis").hide();

            var maxcampania = $('.buscar_campania').data('cam_codigo');
            var maxcampania_nombre = $('.buscar_campania').data('cam_nombre');

            $(".codigo_campania").val(maxcampania);
            $(".nombre_campania").text(maxcampania_nombre);


            $(".items_seleccion li").first().css({"background-color": "rgba(51, 122, 183, 0.75);"});
            $(".buscar_campania").first().css({"color": "#fff"});


            // -------------------------- Seccion que inicia la primer table -------------------------- //

            var primer_table = $('#tabla_campania').DataTable({

                "ajax": {
                    "url": '/controlservidor/public/getcampania/' + maxcampania,
                    "data": 'data',
                    error: function(xhr, textStatus, thrownError) {
                        alert('No se han podido descargar correctamente los datos, por favor recargar la página!!');
                    }
                },
                "columns": [
                    {"data": "cod"},
                    {"data": "conces"},
                    {"data": "marca"},
                    {"data": "proyecto"},
                    {
                        //visible: false,
                        data: null,
                        render: function (row) {

                            var j =  row.versiones + '<input name="campcon_conces[' + row.cod + ']" type="hidden" value="0"/>';
                            return j;
                        }
                    },
                    {
                        data: null,
                        render: function (row) {
                            if (row.cod_estado == '0') {
                                var a = '<span class="label label-info label-mini">' + row.estado + '</span></button>';
                                return a;
                            } else if (row.cod_estado == '1') {
                                var b = '<span class="label label-success label-mini">' + row.estado + '</span></a>';
                                return b;
                            } else if (row.cod_estado == '2') {
                                var c = '<span class="label label-danger label-mini">' + row.estado + '</span></a>';
                                return c;
                            } else if (row.cod_estado == '3') {
                                var d = '<span class="label label-default label-mini">' + row.estado + '</span></a>';
                                return d;
                            }
                        }

                    }
                ],
                "ordering": true,
                "order": [0, 'asc'],
                "lengthMenu": [
                    [10, 15, 25, -1],
                    [10, 15, 25, "Todos"]
                ],
                "pageLength": 10,
                language: {
                    search: "Buscar:",
                    paginate: {
                        previous: 'Anterior',
                        next: 'Siguiente'
                    },
                    zeroRecords: 'No hay registros para mostrar',
                    lengthMenu: 'Ver _MENU_ registros',
                    "info": "Filtrado de _START_ a _END_ - Se encontro _TOTAL_ registros.",
                    select: {
                        rows: {
                            _: "%d Filas Seleccionadas",
                            0: "Haga clic en una fila para seleccionarla",
                            1: "1 Fila Seleccionada"
                        }
                    }
                },
                select: {
                    style: 'multi'
                }
            });


            // -------------------------- Seccion que finaliza la primer table -------------------------- //
            // -------------------------- Seccion que inicia la segunda table -------------------------- //

            var segunda_table = $('#tabla_campania2').DataTable({

                "ajax": {
                    "url": '/controlservidor/public/getcampania_segunda_table/' + maxcampania,
                    error: function(xhr, textStatus, thrownError) {
                        alert(' No se han podido descargar correctamente los datos, por favor recargar la página!!');
                    }
                },
                "columns": [
                    {"data": "cod"},
                    {"data": "conces"},
                    {"data": "marca"},
                    {"data": "proyecto"},
                    {
                        //visible: false,
                        data: null,
                        render: function (row) {

                            var a = '<span class="label label-info label-mini">' + row.versiones + '</span><input name="campcon_conces[' + row.cod + ']" type="hidden" value="0"/>';
                            return a;
                        }
                    }
                ],
                "ordering": true,
                "order": [0, 'asc'],
                "lengthMenu": [
                    [10, 15, 25, -1],
                    [10, 15, 25, "Todos"]
                ],
                "pageLength": 10,
                language: {
                    search: "Buscar:",
                    paginate: {
                        previous: 'Anterior',
                        next: 'Siguiente'
                    },
                    zeroRecords: 'No hay registros para mostrar',
                    lengthMenu: 'Ver _MENU_ registros',
                    "info": "Filtrado de _START_ a _END_ - Se encontro _TOTAL_ registros.",
                    select: {
                        rows: {
                            _: "%d Filas Seleccionadas",
                            0: "Haga clic en una fila para seleccionarla",
                            1: "1 Fila Seleccionada"
                        }
                    }
                },
                select: {
                    style: 'multi'
                }

            });

            // -------------------------- Seccion que finaliza la segunda table -------------------------- //

            // -------------------------- Seccion que inicia el boton de la primer table ---------------- //

            $("#btn_cancelar").attr('disabled', true);

            $('#tabla_campania tbody').on('click', 'tr', function () {
                var data1 = primer_table.row( this ).data();

                leng1 = primer_table.rows('.selected').data().length;

                //alert( data['cod'] );
                var codigo1 = data1['cod'];
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');

                    leng1 = leng1 - 1;

                    $("input[name='campcon_conces[" + codigo1 + "]']").val(0);
                } else {

                    leng1 = leng1 + 1;

                    $("input[name='campcon_conces[" + codigo1 + "]']").val(1);
                }

                if (leng1 == 0){
                    $("#btn_cancelar").attr('disabled', true);
                }else{
                    $("#btn_cancelar").attr('disabled', false);
                }

            } );

            // -------------------------- Seccion que finaliza el boton de la primer table ---------------- //

            // -------------------------- Seccion que inicia el boton de la segunda table ---------------- //


            $("#btn_actualizar").attr('disabled', true);

            $('#tabla_campania2 tbody').on('click', 'tr', function () {
                var data = segunda_table.row( this ).data();

                leng = segunda_table.rows('.selected').data().length;

                //alert( data['cod'] );
                var codigo = data['cod'];
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');

                    leng = leng - 1;

                    $("input[name='campcon_conces[" + codigo + "]']").val(0);
                } else {

                    leng = leng + 1;

                    $("input[name='campcon_conces[" + codigo + "]']").val(1);
                }

                if (leng == 0){
                    $("#btn_actualizar").attr('disabled', true);
                }else{
                    $("#btn_actualizar").attr('disabled', false);
                }

            } );

            // -------------------------- Seccion que finaliza el boton de la segunda table -------------- //

            // ----- inicia el buscador de versiones ---//

            $('#btn_voler_campsis').click(function () {

                $("#btn_todas").show();
                $("#btn_activas").show();

                $("#btn_voler_campsis").hide();
                $('.vercamp_nombre_camp').empty();
            });


            $('#items_campania').on('click', '.buscar_versiones_campania', function () {

                $("#btn_todas").hide();
                $("#btn_activas").hide();

                $("#btn_voler_campsis").show();

                var campver = $(this).data('vercamp');
                var vercamp_nombre = $(this).data('vercamp_nombre');

                $('.vercamp_nombre_camp').text(vercamp_nombre);

                var html = "";

                $.ajax({
                    url: ('/controlservidor/public/getcampsis/' + campver),
                    type: 'GET',
                    dataType: 'json',
                    cache: false,
                    beforeSend: function () {
                        $("#items_campania").empty();
                    }
                }).done(function (data) {

                    $("#items_campania").show();

                    if (data.data != null) {

                        html += "<li>";

                        $.each(data.data, function (i, val) {
                            html += "<p><i class='fa fa-angle-right'></i> " + data.data[i].nom_sistema + " : " + data.data[i].version + "</p>";
                        });

                        html += "</li>";

                        $("#items_campania").html(html);

                    } else {
                        //$("#mensaje_vacio").show();
                    }


                });

            });

            // ----- finalia el buscador de versiones ---//


            // -------------------------- Seccion Inicio Click Campania -------------------------- //



            $('#items_campania').on('click', '.buscar_campania', function () {

                //primer_table.clear().draw();

                segunda_table.clear().draw();

                var cam_codigo = $(this).data('cam_codigo');
                var vercamp = $(this).data('cam_codigo');
                var cam_nombre = $(this).data('cam_nombre');

                $(".codigo_campania").val(cam_codigo);
                $(".nombre_campania").text(cam_nombre);

                $('.buscar_campania').parent().css({"background-color": "#f1f1f1"});
                $('.buscar_campania').css({"color": "#337ab7"});

                $('#' + cam_codigo).parent().css({"background-color": "rgba(51, 122, 183, 0.75);"});
                $('#' + cam_codigo).css({"color": "#fff"});

                // -------------------------- Seccion que inicia la instancia a la primer table -------------------------- //

                var primer_table_url = ('/controlservidor/public/getcampania/' + cam_codigo);

                $.ajax({
                    url: primer_table_url,
                    type: 'GET',
                    dataType: 'json',
                    cache: false,
                    "beforeSend": function () {
                        $('#table1').hide();
                        $("#gif").html("<p align='center'><img src='{{asset('assets/ajax-loader.gif')}}' /> Cargando...</p>");
                    },
                    "complete": function (data) {
                        $("#gif").empty();

/*                        $(".nombre_campania").html(data.responseJSON.nom_campania);
                        $("#cod_campania_input").val(data.responseJSON.cod_campania);*/
                    }

                }).done(function (data) {

                    if (data.data != 0) {
                        $('#table1').show();
                        $('#mensaje_vacio').hide();

                        primer_table.ajax.url(primer_table_url).load();

                    } else {
                        $('#table1').hide();
                        $('#mensaje_vacio').show();
                        //console.log(data);
                    }

                });

                // -------------------------- Seccion que finaliza la instancia a la primer table -------------------------- //
                // -------------------------- Seccion que inicia la instancia a la segunda table -------------------------- //

                var segunda_table_url = ('/controlservidor/public/getcampania_segunda_table/' + cam_codigo);

                $.ajax({
                    url: segunda_table_url,
                    type: 'GET',
                    dataType: 'json',
                    cache: false,
                    "beforeSend": function () {
                        $('#table2').hide();
                        //$("#gif").html("<p align='center'><img src='{{asset('assets/ajax-loader.gif')}}' /> Cargando...</p>");
                    },
                    "complete": function (data) {
                        //$("#gif").empty();
                    }
                }).done(function (data) {

                    if (data.data != 0) {

                        $('#table2').show();
                        $("#btn_actualizar").show();
                        $('#mensaje_vacio2').hide();

                        segunda_table.ajax.url(segunda_table_url).load();

                    } else {

                        $('#table2').hide();
                        $("#btn_actualizar").hide();
                        $('#mensaje_vacio2').show();
                        //console.log(data);
                    }

                });

                // -------------------------- Seccion que finaliza la instancia a la segunda table -------------------------- //

            });

            // -------------------------- Seccion Finaliza Click Campania -------------------------- //

            $.fn.dataTable.ext.errMode = 'throw';

        });


    </script>

    <script>

        $('#alta_campania').on('show.bs.modal', function (e) {
            var modal = $(this);
            modal.find('.modal-title').text('Registrar Nueva Campania');
        });

    </script>

@endsection
