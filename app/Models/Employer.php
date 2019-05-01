<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
	protected $fillable = [ 'name', 'surname', 'birthday', 'salary', 'status', 'department_id', 'experience'];

    public function department()
    {
        return $this->hasOne('App\Models\Departments', 'id', 'department_id');
    }
    public function positions()
    {
        return $this->belongsToMany(Position::class, 'employee_positions');
    }
}
