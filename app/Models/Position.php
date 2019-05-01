<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [ 'name', 'description'];

    public function employees()
    {
        return $this->belongsToMany(Employer::class, 'employee_positions');
    }
}
