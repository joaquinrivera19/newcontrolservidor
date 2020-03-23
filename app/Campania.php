<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 31/05/2017
 * Time: 12:47 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campania extends Model
{
    protected $table = 'comcampania';

    protected $primaryKey = 'cam_codigo';

    public $timestamps = false;
    public $fillable = ['cam_codigo','cam_nombre','cam_creacion','cam_limite','cam_marca','cam_proyecto','cam_eliminado'];

    public function marca(){
        return $this->belongsTo('App\Marca', 'mar_codigo');
    }

    public function proyecto(){
        return $this->belongsTo('App\Proyecto', 'proy_codigo');
    }

    public function comcampcon()
    {
        return $this->hasMany('App\ComCampCon','campcon_campania');
    }

    public function campsis()
    {
        return $this->hasMany('App\CampSis','campsis_campania');
    }
}