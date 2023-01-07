<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
//    use HasFactory;
    protected $primaryKey = 'id_employee';
    protected $guarded = [];

    public function shedules()
    {
        return $this->hasMany(Schedule::class, 'id_employee', 'id_employee');
    }
}
