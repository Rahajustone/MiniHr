<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $fillable = [ 'name', 'description'];

    public function employees(){
    	return $this->hasMany('App\Models\Employer', 'department_id', 'id');
    }
}
