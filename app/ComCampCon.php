<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 06/06/2017
 * Time: 12:39 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComCampCon extends Model
{
    protected $table = 'ComCampCon';

    protected $primaryKey = 'campcon_id';

    public $timestamps = false;
    public $fillable = ['campcon_id','campcon_campania','campcon_conces','campcon_estado'];

    public function campania()
    {
        return $this->belongsTo('App\Campania', 'campcon_campania');
    }

    public function conces()
    {
        return $this->belongsTo('App\Conces', 'campcon_conces');
    }
}