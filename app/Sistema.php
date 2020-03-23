<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 26/06/2017
 * Time: 12:55 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $table = 'sistema';

    protected $primaryKey = 'sis_codigo';

    public $timestamps = false;
    public $fillable = ['sis_codigo','sis_nombre','sis_abrevia','sis_nombreexe','sis_carpetaexe'];

    public function campsis()
    {
        return $this->hasMany('App\CampSis','campsis_sistema');
    }
}