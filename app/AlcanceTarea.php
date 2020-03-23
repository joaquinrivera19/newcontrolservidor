<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 22/06/2017
 * Time: 10:27 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlcanceTarea extends Model
{
    protected $table = 'ComAlcTarea';

    protected $primaryKey = 'alc_codigo';

    public $timestamps = false;
    public $fillable = ['alc_codigo','alc_nombre'];

}