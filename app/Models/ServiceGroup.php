<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceGroup extends Model
{
//    use HasFactory;
    protected $primaryKey = 'id_group';

    public function employees()
    {
        return $this->hasMany(Employee::class, 'service_group', 'id_group');
    }
}
