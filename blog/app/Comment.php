<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comment';
    protected $fillable=['content','aid'];
    public $timestamps=true;
    public function getDateFormat()
    {
        return time();
    }
    public function getCreatedAtAttribute($date)
    {
        return date('Y-m-d',$date);
    }
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
