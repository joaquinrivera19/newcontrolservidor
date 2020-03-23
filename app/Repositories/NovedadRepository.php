<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 09/06/2017
 * Time: 12:57 PM
 */

namespace App\Repositories;

use App\Novedad;

class NovedadRepository
{
    public function getNovedad(){
        
        return Novedad::all();
    }

    public function getNovedadJson(){

        return Novedad::where('nov_estado','=',1)
            ->select('nov_version','nov_titulo','nov_descripcion','nov_conces','nov_tarea','nov_marca','nov_alcance','nov_sistema','nov_tiporeq')
            ->orderBy('nov_version')
            ->get();
    }

}