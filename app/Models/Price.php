<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
//    use HasFactory;
    protected $primaryKey = 'id_service';

    public function serviceGroup()
    {
            return $this->hasOne(ServiceGroup::class, 'id_group', 'id_group');
    }
}
