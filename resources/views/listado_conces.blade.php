@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading" style="height: 55px; padding: 10px; line-height: 32px;">
                    Listado de Empresas


                            <button type="button"
                                    class="btn btn-default" data-toggle="modal"
                                    data-target="#alta" style="float: right">Alta de Nueva Empresa
                                <span class="fa fa-plus" aria-hidden="true"></span>
                            </button>

                </header>
                <div class="panel-body">
                    <div class="col-lg-12">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre Empresa</th>
                                <th style="text-align: center;">Versión</th>
                                <th style="text-align: center;">Audit Servidor</th>
                                <th style="text-align: center;">DB Backup</th>
                                <th style="text-align: center;">Spooler Exp CSI</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($conces as $conc)

                                    <tr>
                                        <td>{{$conc->con_codigo}}</td>
                                        <td>{{$conc->con_nombre}}</td>
                                        <td align="center" width="120px">{{$conc->con_vermaybd}}.{{$conc->con_vermenbd}}</td>
                                        <td align="center" width="140px">
                                            @if($conc->con_auditserv == 1)
                                                <span class="label label-success label-mini">Habilitado</span>
                                            @else
                                                <span class="label label-danger label-mini">Deshabilitado</span>
                                            @endif
                                        </td>
                                        <td align="center" width="140px">
                                            @if($conc->con_dbbackupsc == 1)
                                                <span class="label label-success label-mini">Habilitado</span>
                                            @else
                                                <span class="label label-danger label-mini">Deshabilitado</span>
                                            @endif
                                        </td>
                                        <td align="center" width="140px">
                                            @if($conc->con_spoolercsi == 1)
                                                <span class="label label-success label-mini">Habilitado</span>
                                            @else
                                                <span class="label label-danger label-mini">Deshabilitado</span>
                                            @endif
                                        </td>
                                        <td align="center">
                                            <button type="button" data-con_codigo="{!! $conc->con_codigo !!}"
                                                    data-con_nombre="{!! $conc->con_nombre !!}"
                                                    data-con_vermaybd="{!! $conc->con_vermaybd !!}"
                                                    data-con_vermenbd="{!! $conc->con_vermenbd !!}"
                                                    data-con_auditserv="{!! $conc->con_auditserv !!}"
                                                    data-con_dbbackupsc="{!! $conc->con_dbbackupsc !!}"
                                                    data-con_spoolercsi="{!! $conc->con_spoolercsi !!}"
                                                    data-con_id="{!! $conc->con_id !!}"
                                                    class="btn btn-xs btn-warning" data-toggle="modal"
                                                    data-target="#confirmMod">
                                                <span class="fa fa-pencil" aria-hidden="true"></span>
                                            </button>
                                        </td>
                                        <td align="center">
                                            <button type="button" data-con_codigo="{!! $conc->con_codigo !!}"
                                                    data-con_nombre="{!! $conc->con_nombre !!}"
                                                    data-con_vermaybd="{!! $conc->con_vermaybd !!}"
                                                    data-con_vermenbd="{!! $conc->con_vermenbd !!}"
                                                    data-con_auditserv="{!! $conc->con_auditserv !!}"
                                                    data-con_dbbackupsc="{!! $conc->con_dbbackupsc !!}"
                                                    data-con_spoolercsi="{!! $conc->con_spoolercsi !!}"
                                                    data-con_id="{!! $conc->con_id !!}"
                                                    class="btn btn-xs btn-danger" data-toggle="modal"
                                                    data-target="#eliminar">
                                                <span class="fa fa-trash" aria-hidden="true"></span>
                                            </button>
                                        </td>

                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        {{--- iniciar modal alta-----}}

        <div class="modal fade" id="alta" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"></h4>
                    </div>
                    {!! Form::open(array('url' => 'conces','method' => 'post')) !!}

                    <div class="modal-body">

                        <div class="con_id">
                            {!! Form::hidden('con_id', null) !!}
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_codigo', 'Código:', ['class' => 'control-label col-md-4']) !!}
                                <div class="con_codigo col-md-8">
                                    {!! Form::text('con_codigo', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_nombre', 'Empresa:', ['class' => 'control-label col-md-4']) !!}
                                <div class="con_nombre col-md-8">
                                    {!! Form::text('con_nombre', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_auditserv', 'Audit Servidor:', ['class' => 'control-label col-md-4']) !!}
                                <div class="con_auditserv col-md-8">
                                    {!! Form::select('con_auditserv', ['1' => 'Habilitado', '0' => 'Deshabilitado'], null, ['class' => 'form-control', 'id' => 'con_auditserv']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_dbbackupsc', 'DB Backups:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-lg-8">
                                    {!! Form::select('con_dbbackupsc', ['1' => 'Habilitado', '0' => 'Deshabilitado'], null, ['class' => 'form-control', 'id' => 'con_dbbackupsc']) !!}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_spoolercsi', 'Spooler Exportación CSI:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-lg-8">
                                    {!! Form::select('con_spoolercsi', ['1' => 'Habilitado', '0' => 'Deshabilitado'], null, ['class' => 'form-control', 'id' => 'con_spoolercsi']) !!}
                                </div>
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


        {{--- iniciar modal modificar-----}}

        <div class="modal fade" id="confirmMod" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"></h4>
                    </div>
                    {!! Form::open(array('url' => 'conces','method' => 'post')) !!}

                    <div class="modal-body">

                        <div class="con_id">
                            {!! Form::hidden('con_id', null) !!}
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_codigo', 'Código:', ['class' => 'control-label col-md-4']) !!}
                                <div class="con_codigo col-md-8">
                                    {!! Form::text('con_codigo', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_nombre', 'Empresa:', ['class' => 'control-label col-md-4']) !!}
                                <div class="con_nombre col-md-8">
                                    {!! Form::text('con_nombre', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_auditserv', 'Audit Servidor:', ['class' => 'control-label col-md-4']) !!}
                                <div class="con_auditserv col-md-8">
                                    {!! Form::select('con_auditserv', ['1' => 'Habilitado', '0' => 'Deshabilitado'], null, ['class' => 'form-control', 'id' => 'con_auditserv']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_dbbackupsc', 'DB Backups:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-lg-8">
                                    {!! Form::select('con_dbbackupsc', ['1' => 'Habilitado', '0' => 'Deshabilitado'], null, ['class' => 'form-control', 'id' => 'con_dbbackupsc']) !!}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_spoolercsi', 'Spooler Exportación CSI:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-lg-8">
                                    {!! Form::select('con_spoolercsi', ['1' => 'Habilitado', '0' => 'Deshabilitado'], null, ['class' => 'form-control', 'id' => 'con_spoolercsi']) !!}
                                </div>
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

        {{--- fin modal modificar-----}}

        {{--- Inicio modal eliminar-----}}

        <div class="modal fade" id="eliminar" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"></h4>
                    </div>


                    {!! Form::model($conc,['method' => 'PATCH','route'=>['conces.update','id'=>'delForm']]) !!}

                    <div class="modal-body">

                        <div class="con_id">
                            {!! Form::hidden('con_id', null) !!}
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_codigo', 'Código:', ['class' => 'control-label col-md-4']) !!}
                                <div class="con_codigo col-md-8">
                                    {!! Form::text('con_codigo', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_nombre', 'Empresa:', ['class' => 'control-label col-md-4']) !!}
                                <div class="con_nombre col-md-8">
                                    {!! Form::text('con_nombre', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_auditserv', 'Audit Servidor:', ['class' => 'control-label col-md-4']) !!}
                                <div class="con_auditserv col-md-8">
                                    {!! Form::select('con_auditserv', ['1' => 'Habilitado', '0' => 'Deshabilitado'], null, ['class' => 'form-control', 'id' => 'con_auditserv', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_dbbackupsc', 'DB Backups:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-lg-8">
                                    {!! Form::select('con_dbbackupsc', ['1' => 'Habilitado', '0' => 'Deshabilitado'], null, ['class' => 'form-control', 'id' => 'con_dbbackupsc', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('con_spoolercsi', 'Spooler Exportación CSI:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-lg-8">
                                    {!! Form::select('con_spoolercsi', ['1' => 'Habilitado', '0' => 'Deshabilitado'], null, ['class' => 'form-control', 'id' => 'con_spoolercsi', 'disabled' => 'disabled']) !!}
                                </div>
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


        {{--- Fin modal eliminar-----}}

    </section>


@endsection
@section('scripts')
    <script src="{{asset('assets/js/bootstrap-switch.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>


    <script>

        $('#alta').on('show.bs.modal', function (e) {
            var modal = $(this);
            modal.find('.modal-title').text('Registrar Nueva Empresa');
        });

    </script>


    <script>

        $('#confirmMod').on('show.bs.modal', function (e) {

            var con_id = $(e.relatedTarget).data('con_id');
            var con_codigo = $(e.relatedTarget).data('con_codigo');
            var con_nombre = $(e.relatedTarget).data('con_nombre');
            var con_vermaybd = $(e.relatedTarget).data('con_vermaybd');
            var con_vermenbd = $(e.relatedTarget).data('con_vermenbd');
            var con_auditserv = $(e.relatedTarget).data('con_auditserv');
            var con_dbbackupsc = $(e.relatedTarget).data('con_dbbackupsc');
            var con_spoolercsi = $(e.relatedTarget).data('con_spoolercsi');

            var modal = $(this);
            modal.find('.modal-title').text('Está seguro de que deseas modificar la Empresa ' + con_codigo + ' - ' + con_nombre + ' ?');
            modal.find('.modal-body .con_id input').val(con_id);
            modal.find('.modal-body .con_codigo input').val(con_codigo);
            modal.find('.modal-body .con_nombre input').val(con_nombre);
            modal.find('.modal-body .con_vermaybd input').val(con_vermaybd);
            modal.find('.modal-body .con_vermenbd input').val(con_vermenbd);
            modal.find('.modal-body #con_auditserv').val(con_auditserv);
            modal.find('.modal-body #con_dbbackupsc').val(con_dbbackupsc);
            modal.find('.modal-body #con_spoolercsi').val(con_spoolercsi);
        });

    </script>

    <script>

        $('#eliminar').on('show.bs.modal', function (e) {

            var con_id = $(e.relatedTarget).data('con_id');
            var con_codigo = $(e.relatedTarget).data('con_codigo');
            var con_nombre = $(e.relatedTarget).data('con_nombre');
            var con_vermaybd = $(e.relatedTarget).data('con_vermaybd');
            var con_vermenbd = $(e.relatedTarget).data('con_vermenbd');
            var con_auditserv = $(e.relatedTarget).data('con_auditserv');
            var con_dbbackupsc = $(e.relatedTarget).data('con_dbbackupsc');
            var con_spoolercsi = $(e.relatedTarget).data('con_spoolercsi');

            var modal = $(this);
            modal.find('.modal-title').text('Está seguro de que deseas Eliminar la Empresa ' + con_codigo + ' - ' + con_nombre + ' ?');
            modal.find('.modal-body .con_id input').val(con_id);
            modal.find('.modal-body .con_codigo input').val(con_codigo);
            modal.find('.modal-body .con_nombre input').val(con_nombre);
            modal.find('.modal-body .con_vermaybd input').val(con_vermaybd);
            modal.find('.modal-body .con_vermenbd input').val(con_vermenbd);
            modal.find('.modal-body #con_auditserv').val(con_auditserv);
            modal.find('.modal-body #con_dbbackupsc').val(con_dbbackupsc);
            modal.find('.modal-body #con_spoolercsi').val(con_spoolercsi);

            $("#delForm").attr('action', con_id);
        });

    </script>

@endsection
