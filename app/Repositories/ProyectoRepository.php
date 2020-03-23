<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 31/05/2017
 * Time: 01:10 PM
 */

namespace App\Repositories;

use App\Proyecto;

class ProyectoRepository
{
    public function getProyecto()
    {
        return Proyecto::pluck('proy_nombre','proy_codigo');
    }

}