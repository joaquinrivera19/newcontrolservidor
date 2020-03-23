<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 09/11/2017
 * Time: 10:03 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConceConexion extends Model
{
    protected $table = 'ComConceConexion';

    protected $primaryKey = 'cone_id';

    public $timestamps = false;
    public $fillable = ['cone_id','cone_fechacarga','cone_conces','cone_estado','cone_proceso','cone_observa'];
}