<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Active;

class DrivingClass extends Model
{
    use HasFactory;
        use Active;

    public $timestamps = false;
    public function scopeSorted($query)
    {
        return $query->orderBy('id');
    }

}
