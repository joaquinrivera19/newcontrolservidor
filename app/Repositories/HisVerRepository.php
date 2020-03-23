<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 04/07/2017
 * Time: 11:41 AM
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\HisVer;

class HisVerRepository
{
    public function getUltimosExes()
    {
        return DB::select('exec ultimos_exes');
    }

}