<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 26/06/2017
 * Time: 01:02 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampSis extends Model
{
    protected $table = 'campsis';

    protected $primaryKey = 'campsis_id';

    public $timestamps = false;
    public $fillable = ['campsis_id','campsis_campania','campsis_sistema','campsis_version','campsis_estado'];

    public function campania()
    {
        return $this->belongsTo('App\Campania', 'campsis_campania');
    }

    public function sistema()
    {
        return $this->belongsTo('App\Sistema', 'campsis_sistema');
    }
}