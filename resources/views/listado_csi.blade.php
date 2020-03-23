@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">


                <header class="panel-heading" style="height: 50px">
                    <div class="col-md-4">
                        Resultados del CSI Toyota
                    </div>

                    @include('header')
                </header>


                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-condensed" style="text-align: center;"
                               width="100%"
                               id="campaniaexp">
                            <thead>
                            <tr>
                                <th style="text-align: left;">Nombre Empresa</th>
                                <th style="text-align: center;">Versión</th>
                                <th style="text-align: center;">Domingo</th>
                                <th style="text-align: center;">Lunes</th>
                                <th style="text-align: center;">Martes</th>
                                <th style="text-align: center;">Miercoles</th>
                                <th style="text-align: center;">Jueves</th>
                                <th style="text-align: center;">Viernes</th>
                                <th style="text-align: center;">Sábado</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($csi as $listado)

                                @include('table_min')

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        @include('modal_estado')

    </section>
@endsection