<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 23/05/2017
 * Time: 10:22 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class TareaAct extends Model
{
    protected $table = 'ComTareaSarec';

    protected $primaryKey = 'cts_id';

    public $timestamps = false;
    public $fillable = ['cts_id','cts_version','cts_titulo','cts_script','cts_tarea','cts_tipotar','cts_alcance','cts_tipotardgc','cts_sistema','cts_estado'];

    public function alcancetarea(){
        return $this->belongsTo('App\AlcanceTarea','cts_alcance');
    }
}