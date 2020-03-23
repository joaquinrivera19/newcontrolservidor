<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 13/03/2017
 * Time: 12:32 PM
 */

namespace App\Repositories;

use App\Csi;

class CsiRepository
{
    public function getCsi($fecha)
    {
        return \DB::select('exec csi ? ', array($fecha));
    }

}