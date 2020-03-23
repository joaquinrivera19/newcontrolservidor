<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 14/03/2017
 * Time: 12:07 PM
 */

namespace App\Repositories;

use App\Dbbackup;

class DbbackupRepository
{
    public function getDbbackup($fecha)
    {
        return \DB::select('exec dbbackup ? ', array($fecha));
    }
    
    
}