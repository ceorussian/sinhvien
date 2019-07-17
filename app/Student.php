<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['name', 'gender','class_id', 'birthday','address', 'nation','name_father', 'name_mother'];

    public function class(){
    	return $this->hasOne('App\Lop');
    }

    public function scores(){
    	return $this->hasMany('App\Score');
    }
}
