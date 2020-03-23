<tr>
    <td style="text-align: left; padding-left: 30px;">{{$listado->con_codigo}} {{$listado->con_nombre}}

        @if ($listado->info != 0)

            <button type="button"
               data-cone_conces="{{$listado->con_codigo}}"
               data-cone_nombre="{{$listado->con_nombre}}"
               data-cone_proceso="{{$tipo}}"
               class="btn btn-link btn_campania" style="text-decoration: none;"><span class="label label-danger"> Obs: {{$listado->info}}</span>
            </button>

        @else

            <button type="button"
               data-cone_conces="{{$listado->con_codigo}}"
               data-cone_nombre="{{$listado->con_nombre}}"
               data-cone_proceso="{{$tipo}}"
               class="btn btn-link btn_campania" style="text-decoration: none;"><span class="label label-default"> Obs: {{$listado->info}}</span>
            </button>

        @endif

    </td>

    @if (($tipo == 'csi' || $tipo == 'dbbackups' ))
        <td style="text-align: left; padding-left: 30px;"> {{$listado -> version}} </td>
    @endif
    <td>
        @if(isset($listado->Domingo))
            @if($listado->Domingo == '1-1')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
            @elseif ($listado->Domingo == '1-0')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @elseif ($listado->Domingo == '0-0' or $listado->Domingo == '0-1' )
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Inició con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @endif
        @else
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Inició"><i class="fa fa-times"
                                                               aria-hidden="true"></i>
            </button>
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Finalizó"><i class="fa fa-times"
                                                                 aria-hidden="true"></i>
            </button>
        @endif
    </td>
    <td>
        @if(isset($listado->Lunes))
            @if($listado->Lunes == '1-1')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
            @elseif ($listado->Lunes == '1-0')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @elseif ($listado->Lunes == '0-0' or $listado->Lunes == '0-1')
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Inició con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @endif
        @else
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Inició"><i class="fa fa-times"
                                                               aria-hidden="true"></i>
            </button>
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Finalizó"><i class="fa fa-times"
                                                                 aria-hidden="true"></i>
            </button>
        @endif
    </td>
    <td>
        @if(isset($listado->Martes))
            @if($listado->Martes == '1-1')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
            @elseif ($listado->Martes == '1-0')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @elseif ($listado->Martes == '0-0' or $listado->Martes == '0-1')
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Inició con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @endif
        @else
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Inició"><i class="fa fa-times"
                                                               aria-hidden="true"></i>
            </button>
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Finalizó"><i class="fa fa-times"
                                                                 aria-hidden="true"></i>
            </button>
        @endif

    </td>
    <td>
        @if(isset($listado->Miercoles))
            @if($listado->Miercoles == '1-1')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
            @elseif ($listado->Miercoles == '1-0')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @elseif ($listado->Miercoles == '0-0' or $listado->Miercoles == '0-1')
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Inició con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @endif
        @else
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Inició"><i class="fa fa-times"
                                                               aria-hidden="true"></i>
            </button>
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Finalizó"><i class="fa fa-times"
                                                                 aria-hidden="true"></i>
            </button>
        @endif
    </td>
    <td>
        @if(isset($listado->Jueves))
            @if($listado->Jueves == '1-1')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
            @elseif ($listado->Jueves == '1-0')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @elseif ($listado->Jueves == '0-0' or $listado->Jueves == '0-1')
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Inició con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @endif
        @else
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Inició"><i class="fa fa-times"
                                                               aria-hidden="true"></i>
            </button>
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Finalizó"><i class="fa fa-times"
                                                                 aria-hidden="true"></i>
            </button>
        @endif
    </td>
    <td>
        @if(isset($listado->Viernes))
            @if($listado->Viernes == '1-1')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
            @elseif ($listado->Viernes == '1-0')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @elseif ($listado->Viernes == '0-0' or $listado->Viernes == '0-1')
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Inició con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @endif
        @else
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Inició"><i class="fa fa-times"
                                                               aria-hidden="true"></i>
            </button>
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Finalizó"><i class="fa fa-times"
                                                                 aria-hidden="true"></i>
            </button>
        @endif
    </td>
    <td>
        @if(isset($listado->Sabado))
            @if($listado->Sabado == '1-1')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
            @elseif ($listado->Sabado == '1-0')
                <button class="btn btn-success btn-sm" type="button"
                        data-toggle="tooltip" title="Inició Correctamente"><i
                            class="fa fa-check" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @elseif ($listado->Sabado == '0-0' or $listado->Sabado  == '0-1')
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Inició con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
                <button class="btn btn-danger btn-sm" type="button"
                        data-toggle="tooltip" title="Finalizó con Error"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
            @endif
        @else
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Inició"><i class="fa fa-times"
                                                               aria-hidden="true"></i>
            </button>
            <button class="btn btn-default btn-sm" type="button"
                    data-toggle="tooltip" title="No Finalizó"><i class="fa fa-times"
                                                                 aria-hidden="true"></i>
            </button>
        @endif
    </td>
</tr>