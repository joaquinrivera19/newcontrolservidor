<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 26/06/2017
 * Time: 01:09 PM
 */

namespace App\Repositories;

use App\Sistema;

class SistemaRepository
{
    public function getSistema()
    {
        return Sistema::where('sis_estado','=', 1)->orderBy('sis_codigo', 'asc')->get();
    }

}