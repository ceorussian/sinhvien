<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = ['name'];
    
    public function scores(){
    	return $this->hasMany('App\Score');
    }
}
