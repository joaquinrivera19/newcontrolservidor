<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 23/05/2017
 * Time: 02:13 PM
 */

namespace App\Repositories;
use App\TareaAct;
use Illuminate\Support\Facades\DB;

class TareaActRepository
{
    public function getSigCod($version)
    {
        $max = DB::table('ComTareaSarec')
            ->select(DB::raw('MAX(cts_id) as maximo'))
            ->where('cts_version','=',$version)
            ->first();
        
        if ($max == null) {
            return $max = 1;
        } else {
            return $sig = $max->maximo + 1;
        }

    }
    
    public function getTareaSarec($desde, $hasta)
    {
        
        //$cts_tarvermay = substr($desde, 0, 2);
        //$cts_tarvermen = substr($desde, 3, 2);
        //$cts_tarverrev = substr($desde, 6, 4);
        
        return TareaAct::where('cts_version','>=',$desde)
            ->where('cts_version','<=',$hasta)
            ->select('cts_script','cts_version','cts_id')
            ->orderBy('cts_version')
            ->get();
    }
}