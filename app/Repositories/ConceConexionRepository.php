<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 09/11/2017
 * Time: 10:26 AM
 */

namespace App\Repositories;


use App\ConceConexion;

class ConceConexionRepository
{

    public function getConceConexion($id)
    {
        return ConceConexion::where('cone_conces','=', $id)->orderBy('cone_fechacarga', 'desc')->get();
    }

}