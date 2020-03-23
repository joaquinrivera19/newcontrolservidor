<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 14/03/2017
 * Time: 12:05 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dbbackup extends Model
{
    protected $table = 'comdbbackup';

    protected $primaryKey = 'db_idconces';

    public $timestamps = false;
    public $fillable = ['db_idconces','db_iniexec','db_finexec','db_fecha','db_fechafin','db_horaini','db_horafin','db_proceso','db_version'];
}