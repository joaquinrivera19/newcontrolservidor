<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 31/05/2017
 * Time: 01:07 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'ComProyecto';

    protected $primaryKey = 'proy_codigo';

    public $timestamps = false;
    public $fillable = ['proy_codigo','proy_nombre'];

}