<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table = 'classes';
    protected $fillable = ['name'];


    public function student(){
    	return $this->belongsTo('App\Student', 'id');
    }

    public function scores(){
    	return $this->hasMany('App\Score', 'id');
    }
}
