<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 31/05/2017
 * Time: 12:36 PM
 */

namespace App\Repositories;

use App\Marca;

class MarcaRepository
{
    public function getMarca()
    {
        return Marca::orderBy('mar_nombre')->pluck('mar_nombre','mar_codigo');
    }

}