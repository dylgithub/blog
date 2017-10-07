<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='articles';
    protected $fillable=['title','content','auther','count'];
    public $timestamps=true;
    public function getDateFormat()
    {
        return time();
    }
    public function getCreatedAtAttribute($date)
    {
        return date('Y-m-d',$date);
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
