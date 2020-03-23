<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 09/06/2017
 * Time: 12:50 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $table = 'ComNovedad';

    protected $primaryKey = 'nov_id';

    public $timestamps = false;
    public $fillable = ['nov_id','nov_version','nov_titulo','nov_descripcion','nov_conces','nov_tarea','nov_marca','nov_alcance','nov_sistema','nov_tiporeq','nov_estado'];

    public function conces(){
        return $this->belongsTo('App\Conces', 'nov_conces');
    }

    public function marca(){
        return $this->belongsTo('App\Marca', 'nov_marca');
    }
    
    public function alcancetarea(){
        return $this->belongsTo('App\AlcanceTarea','nov_alcance');
    }
}