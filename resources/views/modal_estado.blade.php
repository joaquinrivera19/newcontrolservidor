{{--- inicio modal estado conexion-----}}

<div class="modal fade" id="modal_estado" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"></h4>
            </div>
            {!! Form::open(array('url' => 'conceconexion','method' => 'post')) !!}

            <div class="modal-body">

                <div class="cone_proceso">
                    {!! Form::hidden('cone_proceso', null) !!}
                </div>

                <div class="row">
                    <div class="form-group">
                        {!! Form::label('cone_conces', 'Empresa:', ['class' => 'control-label col-md-2']) !!}
                        <div class="cone_conces col-md-3">
                            {!! Form::text('cone_conces', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                        </div>
                        <div class="cone_nombre col-md-7">
                            {!! Form::text('cone_nombre', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        {!! Form::label('cone_observa', 'Información:', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-lg-10">
                            {{ Form::textarea('cone_observa', null, ['class' => 'form-control', 'size' => '30x2']) }}
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            {!! Form::close() !!}

            <div class="modal-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Información Conexión</th>
                    </tr>
                    </thead>
                    <tbody id="items_campania">
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>

{{--- fin modal estado conexion-----}}