<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageType extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function language(){
        return $this->belongsTo('App\Language', 'lang_id');
    }
    public function scopeSorted($query)
    {
        return $query->orderBy('id');
    }
}
