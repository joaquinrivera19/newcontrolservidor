<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 31/05/2017
 * Time: 12:32 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'ComMarca';

    protected $primaryKey = 'mar_codigo';

    public $timestamps = false;
    public $fillable = ['mar_codigo','mar_nombre'];
}