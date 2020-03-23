<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 26/06/2017
 * Time: 12:51 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class HisVer extends Model
{
    protected $table = 'hisver';

    protected $primaryKey = 'hv_sistema';

    public $timestamps = false;
    public $fillable = ['hv_sistema','hv_version','hv_ubicacion','hv_fecha','hv_estado'];

    public function sistema(){
        return $this->belongsTo('App\Sistema', 'hv_sistema');
    }

}