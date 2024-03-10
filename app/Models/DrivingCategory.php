<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrivingCategory extends Model
{
    use HasFactory;
    public function drivingclass(){
        return $this->belongsTo(DrivingClass::class, 'class_id');
    }
        public function scopeSorted($query)
    {
        return $query->orderBy('id');
    }

}
