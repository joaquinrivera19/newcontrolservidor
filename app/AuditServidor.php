<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 12/01/2017
 * Time: 09:10 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditServidor extends Model
{
    protected $table = 'ComAuditServidorExp';

    protected $primaryKey = 'auser_idconces';

    public $timestamps = false;
    public $fillable = ['auser_idconces','auser_iniexec','auser_finexec','auser_fecha'];
}