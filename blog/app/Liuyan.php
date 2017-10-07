<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liuyan extends Model
{
    protected $table='liuyan';
    protected $fillable=['content'];
    public $timestamps=true;
    public function getDateFormat()
    {
        return time();
    }
    public function getCreatedAtAttribute($date)
    {
        return date('Y-m-d',$date);
    }
}
