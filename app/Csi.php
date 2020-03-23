<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 13/03/2017
 * Time: 12:33 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Csi extends Model
{
    protected $table = 'ComCsi';

    protected $primaryKey = 'csi_idconces';

    public $timestamps = false;
    public $fillable = ['csi_idconces','csi_iniexec','csi_finexec','csi_fecha','csi_fechafin','csi_horaini','csi_horafin','csi_proceso','csi_version'];
}