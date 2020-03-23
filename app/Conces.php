<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 03/03/2017
 * Time: 12:19 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conces extends Model
{
    protected $table = 'conces';

    protected $primaryKey = 'con_id';

    public $timestamps = false;
    public $fillable = ['con_id','con_codigo','con_nombre','con_email','con_marca','con_sophab',
        'con_vermaybd','con_vermenbd','con_auditserv','con_dbbackupsc','con_spoolercsi','con_proyecto'];

    public function marca(){
        return $this->belongsTo('App\Marca', 'con_marca');
    }
    
    public function proyecto(){
        return $this->belongsTo('App\Proyecto', 'con_proyecto');
    }

    public function comcampcon()
    {
        return $this->hasMany('App\ComCampCon','campcon_conces');
    }
}