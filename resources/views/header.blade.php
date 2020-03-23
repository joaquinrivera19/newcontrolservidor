<?php

if ($now_index == 1){

    $now_date = \Carbon\Carbon::now()->format('d-m-Y');

    //$fecha = Carbon::parse('last sunday')->toDateString();

    //$now = \Carbon\Carbon::parse('first sunday of' .$now_date)->toDateString();

    $now = \Carbon\Carbon::parse('last sunday')->toDateString();

    $imprimir_now = \Carbon\Carbon::parse('last sunday')->format('d-m-Y');

    $fecha_anterior = \Carbon\Carbon::parse($now)->subWeek()->toDateString();
    $fecha_siguente = \Carbon\Carbon::parse($now)->addWeek()->toDateString();

} else {

    $fecha_dif = \Carbon\Carbon::parse($fecha)->format('d-m-Y');

    $fecha_anterior = \Carbon\Carbon::parse($fecha)->subWeek()->toDateString();
    $fecha_siguente = \Carbon\Carbon::parse($fecha)->addWeek()->toDateString();

}


?>
<div class="pull-right">

    <ul class="pager" style="margin: -5px 0 0 0">
        <li class="previous"><a href="{{ url('/'.$tipo.'/'.$fecha_anterior) }}" style="border: 1px solid #EFF2F7;">← Semana Anterior</a></li>
        <li>
            <a href="{{ url('/'.$tipo) }}" style="border: 1px solid #EFF2F7;">
                <?php

                if ($now_index == 1){

                    echo $imprimir_now;

                } else {

                    echo $fecha_dif;

                }

                ?>

            </a>
        </li>
        <li class="next"><a href="{{ url('/'.$tipo.'/'.$fecha_siguente) }}" style="border: 1px solid #EFF2F7;">Semana Siguiente →</a></li>
    </ul>

</div>